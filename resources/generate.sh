#!/usr/bin/env bash

set -e

ERROR='\033[91m'
SUCCESS='\033[92m'
INFO='\033[94m'
RESET='\033[0m'

LOG_FILE_NAME="larasurf.generate.log"
BUFFERED_LOG="$(date +"%s"): Start"

TAG_LARAVEL_DOCKER_TEMPLATE="1.0.0-alpha.4"
CONSTRAINT_LARASURF="^1.0@alpha"

export SURF_USER_ID=${SURF_USER_ID:-$UID}
export SURF_GROUP_ID=${SURF_GROUP_ID:-$(id -g)}

function log_message() {
    echo -e "$(date +"%s"): $1" >> $LOG_FILE_NAME
}

function log_message_buffered() {
    BUFFERED_LOG=$(printf "$BUFFERED_LOG\n%s" "$(date +"%s"): $1")
}

function surf_install() {
  PACKAGE_AUTH='%PACKAGE_AUTH%'
  PACKAGE_IDE_HELPER=%PACKAGE_IDE_HELPER%
  PACKAGE_CS_FIXER=%PACKAGE_CS_FIXER%
  PACKAGE_DUSK=%PACKAGE_DUSK%
  LOCAL_TLS=%LOCAL_TLS%
  ENVIRONMENTS='%ENVIRONMENTS%'
  AWSLOCAL_PORT='%AWSLOCAL_PORT%'
  MAIL_UI_PORT='%MAIL_UI_PORT%'
  APP_PORT='%APP_PORT%'
  APP_TLS_PORT='%APP_TLS_PORT%'
  DB_PORT='%DB_PORT%'
  CACHE_PORT='%CACHE_PORT%'
  VITE_HMR_PORT='%VITE_HMR_PORT%'
  PROJECT_DIR='%PROJECT_DIR%'
  DEV_BRANCH='%DEV_BRANCH%'
  TEMPLATE_BRANCH='%TEMPLATE_BRANCH%'
  SPLASH=%SPLASH%

  # log options

  if [[ -n "$DEV_BRANCH" ]]; then
    log_message_buffered "Dev branch: $DEV_BRANCH"
  else
    log_message_buffered "LaraSurf constraint: $CONSTRAINT_LARASURF"
  fi

  if [[ -n "$TEMPLATE_BRANCH" ]]; then
    log_message_buffered "Template branch: $TEMPLATE_BRANCH"
  else
    log_message_buffered "Template tag: $TAG_LARAVEL_DOCKER_TEMPLATE"
  fi

  case "$PACKAGE_AUTH" in
    "jet-inertia")
      log_message_buffered "Auth: jetstream inertia (no teams)"
      ;;
    "jet-inertia-teams")
      log_message_buffered "Auth: jetstream inertia (teams)"
      ;;
    "jet-livewire")
      log_message_buffered "Auth: jetstream livewire (no teams)"
      ;;
    "jet-livewire-teams")
      log_message_buffered "Auth: jetstream livewire (teams)"
      ;;
    "breeze-blade")
      log_message_buffered "Auth: breeze (blade)"
      ;;
    "breeze-react")
      log_message_buffered "Auth: breeze (react)"
      ;;
    "breeze-vue")
      log_message_buffered "Auth: breeze (vue)"
      ;;
    "breeze-api")
      log_message_buffered "Auth: breeze (api)"
      ;;
    *)
      log_message_buffered "Auth: none"
      ;;
  esac

  if [[ "$PACKAGE_IDE_HELPER" == true ]]; then
    log_message_buffered "Package: IDE helper"
  fi

  if [[ "$PACKAGE_CS_FIXER" == true ]]; then
    log_message_buffered "Package: code style fixer"
  fi

  if [[ "$PACKAGE_DUSK" == true ]]; then
    log_message_buffered "Package: laravel dusk"
  fi

  if [[ "$LOCAL_TLS" == true ]]; then
    log_message_buffered "Local TLS enabled"
  fi

  if [[ "$SPLASH" == false ]]; then
   log_message_buffered "Splash: false"
  fi

  log_message_buffered "Environments: $ENVIRONMENTS"
  log_message_buffered "Docker-compose port - AWS local: $AWSLOCAL_PORT"
  log_message_buffered "Docker-compose port - mail UI: $MAIL_UI_PORT"
  log_message_buffered "Docker-compose port - app: $APP_PORT"
  log_message_buffered "Docker-compose port - app TLS: $APP_TLS_PORT"
  log_message_buffered "Docker-compose port - database: $DB_PORT"
  log_message_buffered "Docker-compose port - cache: $CACHE_PORT"
  log_message_buffered "Docker-compose port - vite hmr: $VITE_HMR_PORT"
  log_message_buffered "Project directory: $PROJECT_DIR"

  # check options and software prerequisites

  if [[ -z "$ENVIRONMENTS" ]]; then
    echo -e "${ERROR}You must specify the environments for your application${RESET}"

    exit 1
  fi

  if [[ -z "$PROJECT_DIR" ]]; then
    echo -e "${ERROR}You must specify a project directory name for your application${RESET}"

    exit 1
  fi

  if [[ -z "$(which git)" ]]; then
    echo -e "${ERROR}Please ensure you have installed git${RESET}"

    exit 1
  fi

  if [[ -z "$(git config --global user.name)" ]]; then
    echo -e "${ERROR}Please configure a global git user name${RESET}"

    exit 1
  fi

  if [[ -z "$(git config --global user.email)" ]]; then
    echo -e "${ERROR}Please configure a global git user email${RESET}"

    exit 1
  fi

  if [[ -z "$(which docker-compose)" ]]; then
    echo -e "${ERROR}Please ensure you have installed Docker and Docker-Compose${RESET}"

    exit 1
  fi

  if [[ -z "$(which nc)" ]]; then
    echo -e "${ERROR}Please ensure you have installed netcat${RESET}"

    exit 1
  fi

  # determine mkcert executable to look for

  if [[ "$LOCAL_TLS" == true ]]; then
      if [[ -n "$(which mkcert.exe)" ]]; then
        TLS_COMMAND='mkcert.exe'
      elif [[ -n "$(which mkcert)" ]]; then
        TLS_COMMAND='mkcert'
      else
        echo -e "${ERROR}To use local TLS, please install mkcert: https://github.com/FiloSottile/mkcert${RESET}"

        exit 1
      fi

      log_message_buffered "TLS command: $TLS_COMMAND"
  fi

  # check required ports are open

  nc -vz localhost "$AWSLOCAL_PORT" > /dev/null 2>&1 && echo -e "${ERROR}Specified awslocal port $AWSLOCAL_PORT is not open${RESET}" && exit 1

  log_message_buffered "Port open: $AWSLOCAL_PORT"

  nc -vz localhost "$MAIL_UI_PORT" > /dev/null 2>&1 && echo -e "${ERROR}Specified mail UI port $MAIL_UI_PORT is not open${RESET}" && exit 1

  log_message_buffered "Port open: $MAIL_UI_PORT"

  nc -vz localhost "$APP_PORT" > /dev/null 2>&1 && echo -e "${ERROR}Specified app port $APP_PORT is not open${RESET}" && exit 1

  log_message_buffered "Port open: $APP_PORT"

  nc -vz localhost "$DB_PORT" > /dev/null 2>&1 && echo -e "${ERROR}Specified db port $DB_PORT is not open${RESET}" && exit 1

  log_message_buffered "Port open: $DB_PORT"

  nc -vz localhost "$CACHE_PORT" > /dev/null 2>&1 && echo -e "${ERROR}Specified cache port $CACHE_PORT is not open${RESET}" && exit 1

  log_message_buffered "Port open: $CACHE_PORT"

  nc -vz localhost "$VITE_HMR_PORT" > /dev/null 2>&1 && echo -e "${ERROR}Specified vite hmr port $VITE_HMR_PORT is not open${RESET}" && exit 1

  log_message_buffered "Port open: $VITE_HMR_PORT"

  if [[ "$LOCAL_TLS" == true ]]; then
    nc -vz localhost "$APP_TLS_PORT" > /dev/null 2>&1 && echo -e "${ERROR}Specified app TLS port $APP_TLS_PORT is not open${RESET}" && exit 1

    log_message_buffered "Port open: $APP_TLS_PORT"
  fi

  echo -e "${SUCCESS}Generating new LaraSurf project: ${INFO}${PROJECT_DIR}${RESET}"

  echo -e "Environments: ${INFO}${ENVIRONMENTS}${RESET}"
  echo -e "Preset: ${INFO}${PACKAGE_AUTH}${RESET}"

  if [[ "$PACKAGE_IDE_HELPER" == true ]]; then
    echo -e "IDE Helper: ${INFO}true${RESET}"
  else
      echo -e "IDE Helper: ${INFO}false${RESET}"
  fi

  if [[ "$PACKAGE_CS_FIXER" == true ]]; then
    echo -e "Code Style Fixer: ${INFO}true${RESET}"
  else
      echo -e "Code Style Fixer: ${INFO}false${RESET}"
  fi

  if [[ "$PACKAGE_DUSK" == true ]]; then
    echo -e "Laravel Dusk: ${INFO}true${RESET}"
  else
      echo -e "Laravel Dusk: ${INFO}false${RESET}"
  fi

  if [[ "$LOCAL_TLS" == true ]]; then
    echo -e "Local TLS: ${INFO}true${RESET}"
  else
      echo -e "Local TLS: ${INFO}false${RESET}"
  fi

  echo -e "Local AWS port: ${INFO}${AWSLOCAL_PORT}${RESET}"
  echo -e "Local mail UI port: ${INFO}${MAIL_UI_PORT}${RESET}"
  echo -e "Local app port: ${INFO}${APP_PORT}${RESET}"

  if [[ "$LOCAL_TLS" == true ]]; then
    echo -e "Local app TLS port: ${INFO}${APP_TLS_PORT}${RESET}"
  fi

  echo -e "Local database port: ${INFO}${DB_PORT}${RESET}"
  echo -e "Local cache port: ${INFO}${CACHE_PORT}${RESET}"
  echo -e "Local Vite HMR port: ${INFO}${VITE_HMR_PORT}${RESET}"

  if [[ -n "$DEV_BRANCH" ]]; then
    echo -e "LaraSurf dev branch: ${INFO}${DEV_BRANCH}${RESET}"
  else
    log_message_buffered "LaraSurf version constraint: $CONSTRAINT_LARASURF"
  fi

  if [[ -n "$TEMPLATE_BRANCH" ]]; then
    echo -e "Laravel Docker template branch: ${INFO}${TEMPLATE_BRANCH}${RESET}"
  else
    log_message_buffered "Laravel Docker template version: $TAG_LARAVEL_DOCKER_TEMPLATE"
  fi

  # clone template project

  if [[ "$PROJECT_DIR" != '.' ]]; then
    if [[ -d "$PROJECT_DIR" ]]; then
      echo -e "${ERROR}Target directory already exists!${RESET}"
      exit 1
    fi

    echo 'Cloning project template...'
    cd $(pwd)

    if [[ -n "$TEMPLATE_BRANCH" ]]; then
        git clone -q --single-branch --branch "$TEMPLATE_BRANCH" --depth=1 git@github.com:larasurf/laravel-docker-template.git "$PROJECT_DIR" && cd "$PROJECT_DIR" && rm -rf .git
    else
        mkdir "$PROJECT_DIR" && cd "$PROJECT_DIR" && curl --silent --location "https://github.com/larasurf/laravel-docker-template/archive/refs/tags/$TAG_LARAVEL_DOCKER_TEMPLATE.tar.gz" | tar -xz && find "laravel-docker-template-$TAG_LARAVEL_DOCKER_TEMPLATE" -mindepth 1 -maxdepth 1 -exec mv {} . \; && rmdir "laravel-docker-template-$TAG_LARAVEL_DOCKER_TEMPLATE"

        if [[ -f "pax_global_header" ]]; then
            rm -f pax_global_header
        fi
    fi

    cd $(pwd)
  elif [[ "$PROJECT_DIR" == '.' ]] && [[ -f 'composer.json' ]] && [[ -d 'app' ]]; then
    echo -e "${ERROR}Laravel project already exists!${RESET}"
    exit 1
  fi

  echo -e "$BUFFERED_LOG" >> $LOG_FILE_NAME

  # build installation command

  INSTALL_CMD='composer create-project laravel/laravel /tmp/laravel "9.*" --prefer-dist && echo "Moving files..." && cp -rT /tmp/laravel .'

  if [[ "$PACKAGE_AUTH" == "jet-inertia" ]] || [[ "$PACKAGE_AUTH" == "jet-inertia-teams" ]] || [[ "$PACKAGE_AUTH" == "jet-livewire" ]] || [[ "$PACKAGE_AUTH" == "jet-livewire-teams" ]]; then
    INSTALL_CMD="$INSTALL_CMD && composer require laravel/jetstream"
  elif [[ "$PACKAGE_AUTH" == "breeze-blade" ]] || [[ "$PACKAGE_AUTH" == "breeze-react" ]] || [[ "$PACKAGE_AUTH" == "breeze-vue" ]] || [[ "$PACKAGE_AUTH" == "breeze-api" ]]; then
    INSTALL_CMD="$INSTALL_CMD && composer require laravel/breeze"
  fi

  if [[ "$PACKAGE_AUTH" == "jet-inertia" ]]; then
    INSTALL_CMD="$INSTALL_CMD && php artisan jetstream:install inertia"
  elif [[ "$PACKAGE_AUTH" == "jet-inertia-teams" ]]; then
    INSTALL_CMD="$INSTALL_CMD && php artisan jetstream:install inertia --teams"
  elif [[ "$PACKAGE_AUTH" == "jet-livewire" ]]; then
    INSTALL_CMD="$INSTALL_CMD && php artisan jetstream:install livewire && php artisan vendor:publish --tag=jetstream-views"
  elif [[ "$PACKAGE_AUTH" == "jet-livewire-teams" ]]; then
    INSTALL_CMD="$INSTALL_CMD && php artisan jetstream:install livewire --teams && php artisan vendor:publish --tag=jetstream-views"
  elif [[ "$PACKAGE_AUTH" == "breeze-blade" ]]; then
    INSTALL_CMD="$INSTALL_CMD && php artisan breeze:install"
  elif [[ "$PACKAGE_AUTH" == "breeze-vue" ]]; then
    INSTALL_CMD="$INSTALL_CMD && php artisan breeze:install vue"
  elif [[ "$PACKAGE_AUTH" == "breeze-react" ]]; then
    INSTALL_CMD="$INSTALL_CMD && php artisan breeze:install react"
  elif [[ "$PACKAGE_AUTH" == "breeze-api" ]]; then
    INSTALL_CMD="$INSTALL_CMD && php artisan breeze:install api"
  fi

  INSTALL_CMD="$INSTALL_CMD && composer require league/flysystem-aws-s3-v3 \"^3.0\""

  if [[ "$PACKAGE_IDE_HELPER" == true ]]; then
    INSTALL_CMD="$INSTALL_CMD && composer require --dev barryvdh/laravel-ide-helper \"^2.12\""
  fi

  if [[ "$PACKAGE_CS_FIXER" == true ]]; then
    INSTALL_CMD="$INSTALL_CMD && composer require --dev friendsofphp/php-cs-fixer \"^3.0\""
  fi

  if [[ "$PACKAGE_DUSK" == true ]]; then
    INSTALL_CMD="$INSTALL_CMD && composer require --dev laravel/dusk"
  fi

  if [[ "$PACKAGE_AUTH" != "breeze-api" ]]; then
    INSTALL_CMD="$INSTALL_CMD && yarn && yarn upgrade && yarn run build"
  fi

  INSTALL_CMD="$INSTALL_CMD && echo 'Installing LaraSurf...'"

  # install the LaraSurf package from a development branch or a tag

  if [[ -n "$DEV_BRANCH" ]]; then
    INSTALL_CMD="$INSTALL_CMD && echo 'Using dev branch $DEV_BRANCH'"
    INSTALL_CMD="$INSTALL_CMD && composer config repositories.0 vcs https://github.com/larasurf/larasurf && until curl api.github.com --output /dev/null --silent; do : echo 'Waiting for GitHub...' && sleep 1 ; done"
    INSTALL_CMD="$INSTALL_CMD && composer config minimum-stability dev"
    INSTALL_CMD="$INSTALL_CMD && composer config prefer-stable true"
    INSTALL_CMD="$INSTALL_CMD && composer require --dev larasurf/larasurf dev-$DEV_BRANCH"
  else
    INSTALL_CMD="$INSTALL_CMD && composer config prefer-stable true"
    INSTALL_CMD="$INSTALL_CMD && composer require --dev larasurf/larasurf \"$CONSTRAINT_LARASURF\""
  fi

  # pull images

  log_message "Pulling images"

  echo "Pulling images..."

  cd $(pwd)
  docker pull amazon/aws-cli:2.2.37 >> $LOG_FILE_NAME 2>&1
  cd $(pwd)
  docker pull localstack/localstack >> $LOG_FILE_NAME 2>&1
  cd $(pwd)
  docker pull mailhog/mailhog >> $LOG_FILE_NAME 2>&1
  cd $(pwd)
  docker pull nginx:1.21.4-alpine >> $LOG_FILE_NAME 2>&1
  cd $(pwd)
  docker pull php:8.0-fpm-alpine >> $LOG_FILE_NAME 2>&1
  cd $(pwd)
  docker pull mysql:8.0 >> $LOG_FILE_NAME 2>&1
  cd $(pwd)
  docker pull redis:alpine >> $LOG_FILE_NAME 2>&1
  cd $(pwd)

  if [[ "$PACKAGE_DUSK" == true ]]; then
    docker pull selenium/standalone-chrome >> $LOG_FILE_NAME 2>&1
  fi

  log_message "Pulled images"

  # build images

  log_message "Building laravel image"

  echo "Building images..."
  cd $(pwd)
  docker-compose build --no-cache --progress=plain laravel >> $LOG_FILE_NAME 2>&1

  log_message "Built laravel image"

  # generate project

  log_message "Generation command is: $INSTALL_CMD"

  cd $(pwd)
  echo "Generating project..."
  docker-compose run --rm --no-deps laravel bash -c "$INSTALL_CMD" >> $LOG_FILE_NAME 2>&1
  cd $(pwd)

  log_message "Generated project"

  # install TLS certificate if applicable

  if [[ "$TLS_COMMAND" == 'mkcert.exe' ]]; then
    echo "Configuring TLS..."

    log_message "Trusting mkcert authority"

    mkcert.exe -install >> $LOG_FILE_NAME 2>&1

    log_message "Trusted mkcert authority"

    cd $(pwd)

    log_message "Generating mkcert certificates"

    mkcert.exe -key-file .docker/tls/local.pem -cert-file .docker/tls/local.crt localhost >> $LOG_FILE_NAME 2>&1

    log_message "Generated mkcert certificate"
  elif [[ "$TLS_COMMAND" == 'mkcert' ]]; then
    echo "Configuring TLS..."

    log_message "Trusting mkcert authority"

    mkcert -install >> $LOG_FILE_NAME 2>&1

    log_message "Trusted mkcert authority"

    cd $(pwd)

    log_message "Generating mkcert certificates"

    mkcert -key-file .docker/tls/local.pem -cert-file .docker/tls/local.crt localhost >> $LOG_FILE_NAME 2>&1

    log_message "Generated mkcert certificate"
  fi

  # write ports to environment files for docker-compose to pick up

  echo "Updating environment files..."

  cat << EOF >> '.env.example'

# LOCAL ONLY: LaraSurf docker-compose ports
SURF_AWSLOCAL_PORT=4566
SURF_MAIL_UI_PORT=8025
SURF_APP_PORT=80
SURF_APP_TLS_PORT=443
SURF_USE_TLS=$LOCAL_TLS
SURF_DB_PORT=3306
SURF_CACHE_PORT=6379
SURF_VITE_HMR_PORT=5173
SURF_USER_ID=1000
SURF_GROUP_ID=1000

EOF

  log_message "Created .env.example file"

  cat << EOF >> '.env'

# LOCAL ONLY: LaraSurf docker-compose ports
SURF_AWSLOCAL_PORT=$AWSLOCAL_PORT
SURF_MAIL_UI_PORT=$MAIL_UI_PORT
SURF_APP_PORT=$APP_PORT
SURF_APP_TLS_PORT=$APP_TLS_PORT
SURF_USE_TLS=$LOCAL_TLS
SURF_DB_PORT=$DB_PORT
SURF_CACHE_PORT=$CACHE_PORT
SURF_VITE_HMR_PORT=$VITE_HMR_PORT
SURF_USER_ID=$SURF_USER_ID
SURF_GROUP_ID=$SURF_GROUP_ID

EOF

  log_message "Created .env file"

  # generate a project ID based upon the current date (to the minute)

  PROJECT_ID="$(date +"%Y%m%d%H%M")"

  # write the default larasurf.json configuration file

  echo "Creating configuration file..."

  if [[ "$ENVIRONMENTS" == 'local-stage-production' ]]; then
    cat << EOF > 'larasurf.json'
{
    "project-name": "$PROJECT_DIR",
    "project-id": "$PROJECT_ID",
    "aws-profile": "default",
    "environments": {
      "stage": null,
      "production": null
    }
}
EOF
  elif [[ "$ENVIRONMENTS" == 'local-production' ]]; then
    cat << EOF > 'larasurf.json'
{
    "project-name": "$PROJECT_DIR",
    "project-id": "$PROJECT_ID",
    "aws-profile": "default",
    "environments": {
      "production": null
    }
}
EOF
  else
    cat << EOF > 'larasurf.json'
{
    "project-name": "$PROJECT_DIR",
    "project-id": "$PROJECT_ID",
    "aws-profile": "default",
    "environments": null
}
EOF
  fi

  log_message "Created larasurf.json file"

  # build the post installation command

  POST_INSTALL_CMD='php artisan larasurf:publish --awslocal --env-changes --circleci --gitignore --healthcheck'

  case "$PACKAGE_AUTH" in
    "jet-inertia")
      POST_INSTALL_CMD="$POST_INSTALL_CMD --vite-inertia"
      ;;
    "jet-inertia-teams")
      POST_INSTALL_CMD="$POST_INSTALL_CMD --vite-inertia"
      ;;
    "jet-livewire")
      POST_INSTALL_CMD="$POST_INSTALL_CMD --vite-livewire"
      ;;
    "jet-livewire-teams")
      POST_INSTALL_CMD="$POST_INSTALL_CMD --vite-livewire"
      ;;
    "breeze-blade")
      POST_INSTALL_CMD="$POST_INSTALL_CMD --vite-breeze-blade"
      ;;
    "breeze-react")
      POST_INSTALL_CMD="$POST_INSTALL_CMD --vite-breeze-react"
      ;;
    "breeze-vue")
      POST_INSTALL_CMD="$POST_INSTALL_CMD --vite-breeze-vue"
      ;;
  esac

  if [[ "$ENVIRONMENTS" == 'local-stage-production' ]] || [[ "$ENVIRONMENTS" == 'local-production' ]] ; then
    POST_INSTALL_CMD="$POST_INSTALL_CMD --cloudformation --proxies"
  fi

  if [[ "$LOCAL_TLS" == true ]]; then
    POST_INSTALL_CMD="$POST_INSTALL_CMD --nginx-local-tls"
  else
    POST_INSTALL_CMD="$POST_INSTALL_CMD --nginx-local-insecure"
  fi

  if grep -q '"friendsofphp/php-cs-fixer"' 'composer.json'; then
    POST_INSTALL_CMD="$POST_INSTALL_CMD --cs-fixer"
  fi

  if grep -q '"laravel/dusk"' 'composer.json'; then
    POST_INSTALL_CMD="$POST_INSTALL_CMD --dusk && php artisan dusk:install"
  fi

  POST_INSTALL_CMD="$POST_INSTALL_CMD && php artisan migrate --force"

  if grep -q '"barryvdh/laravel-ide-helper"' 'composer.json'; then
    POST_INSTALL_CMD="$POST_INSTALL_CMD && php artisan ide-helper:generate && php artisan ide-helper:meta && php artisan ide-helper:models --write-mixin"
  fi

  if grep -q '"friendsofphp/php-cs-fixer"' 'composer.json'; then
    POST_INSTALL_CMD="$POST_INSTALL_CMD && ./vendor/bin/php-cs-fixer fix"
  fi

  log_message "Stopping services"

  cd $(pwd)

  # start the services

  docker-compose down --volumes >> $LOG_FILE_NAME 2>&1

  log_message "Services stopped"
  log_message "Starting services"

  echo "Starting services..."

  cd $(pwd)

  docker-compose up -d >> $LOG_FILE_NAME 2>&1
  cd $(pwd)

  log_message "Starting started"

  log_message "Waiting for DB to respond"

  # wait for the database to respond

  echo ""

  COUNT=1

  until curl --verbose --fail --http0.9 "localhost:$DB_PORT" >> "$LOG_FILE_NAME" 2>&1
  do
      {
        echo -e "\e[1A\e[KWaiting for database to be ready... (try $COUNT of 60)"
        ((COUNT++)) && ((COUNT==61)) && echo -e "${ERROR}Could not connect to database after 60 tries!${RESET}" && echo "" >> $LOG_FILE_NAME && log_message "Database never responded" && log_message "Database container logs:" && docker-compose logs database >> $LOG_FILE_NAME 2>&1 && exit 1
        sleep 3
      } 1>&2
  done

  echo "" >> $LOG_FILE_NAME

  log_message "Database responded"

  # execute the post installation command

  log_message "Post generation command: $POST_INSTALL_CMD"

  echo 'Running post-generation commands...'

  cd $(pwd)

  docker-compose exec -T laravel bash -c "$POST_INSTALL_CMD" >> $LOG_FILE_NAME 2>&1 && cd $(pwd)

  if grep -q '"laravel/dusk"' 'composer.json'; then
    cd $(pwd)

    log_message "Start chrome for dusk"

    docker-compose up -d >> $LOG_FILE_NAME 2>&1
  fi

  # ensure surf CLI script is executable

  log_message "Post generation command run"

  cd $(pwd)

  chmod +x vendor/larasurf/larasurf/bin/surf.sh

  log_message "surf.sh chmod"

  echo 'Initializing git repository...'

  # make initial commit

  if [[ ! -d '.git' ]]; then
    git init >> $LOG_FILE_NAME 2>&1

    log_message "Initialized git repository"

    echo 'Making first commit...'

    cd $(pwd)
    git add . >> $LOG_FILE_NAME 2>&1

    log_message "Staged files for commit"

    cd $(pwd)

    git commit -m 'larasurf project generation' >> $LOG_FILE_NAME

    log_message "Made initial commit"

    cd $(pwd)
    git branch -M main >> $LOG_FILE_NAME 2>&1

    log_message "Renamed master to main"
  else
    git add . >> $LOG_FILE_NAME 2>&1

    log_message "Staged files for commit"

    cd $(pwd)
    git commit -m 'larasurf installation' >> $LOG_FILE_NAME 2>&1

    log_message "Made initial commit"
  fi

  cd $(pwd)

  # make initial branches if applicable

  if [[ "$ENVIRONMENTS" == 'local-stage-production' ]] && [[ -z "$(git branch -l stage)" ]] && [[ -z "$(git branch -l develop)" ]]; then
    echo 'Creating stage and develop branches...'

    git checkout -b stage >> $LOG_FILE_NAME 2>&1

    log_message "Checked out stage branch"

    cd $(pwd)
    git checkout -b develop >> $LOG_FILE_NAME 2>&1

    log_message "Checked out develop branch"
  elif [[ "$ENVIRONMENTS" == 'local-production' ]] && [[ -z "$(git branch -l develop)" ]]; then
    echo 'Creating develop branch...'

    git checkout -b develop >> $LOG_FILE_NAME 2>&1

    log_message "Checked out develop branch"
  fi

  # rebuild webserver image after nginx configuration changes

  cd $(pwd)
  log_message "Rebuilding webserver image"

  docker-compose build --no-cache --progress=plain webserver >> $LOG_FILE_NAME 2>&1

  log_message "Webserver image rebuilt"

  log_message "Recreating services"

  cd $(pwd)
  docker-compose up --force-recreate -d >> $LOG_FILE_NAME 2>&1

  log_message "Services recreated"

  echo -e "${SUCCESS}Project generation complete${RESET}"

  log_message "Project generation complete"

  # check for sudo permission
  if sudo -n true 2>/dev/null; then
      sudo chown -R $SURF_USER_ID:$SURF_GROUP_ID .

      # display the splash screen
      if [[ "$SPLASH" == true ]]; then
        cd $(pwd)
        docker-compose exec -T -u $SURF_USER_ID laravel php artisan larasurf:splash
      fi
  else
      echo -e "${INFO}Your password is required in order to change ownership of the generated files.${RESET}"
      sudo chown -R $SURF_USER_ID:$SURF_GROUP_ID .

      # display the splash screen
      if [[ "$SPLASH" == true ]]; then
        cd $(pwd)
        docker-compose exec -T -u $SURF_USER_ID laravel php artisan larasurf:splash
      fi
  fi
}

surf_install "$@"
