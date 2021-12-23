#!/usr/bin/env bash

set -e

ERROR='\033[91m'
SUCCESS='\033[92m'
RESET='\033[0m'

LOG_FILE_NAME="larasurf.generate.log"
BUFFERED_LOG="$(date +"%s"): Start"

export SURF_USER_ID=${SURF_USER_ID:-$UID}

function log_message() {
    echo -e "$(date +"%s"): $1" >> $LOG_FILE_NAME
}

function log_message_buffered() {
    BUFFERED_LOG=$(printf "$BUFFERED_LOG\n%s" "$(date +"%s"): $1")
}

function surf_install() {
  AUTH_JET_INERTIA=false
  AUTH_JET_INERTIA_TEAMS=false
  AUTH_JET_LIVEWIRE=false
  AUTH_JET_LIVEWIRE_TEAMS=false
  AUTH_BREEZE_BLADE=false
  AUTH_BREEZE_VUE=false
  AUTH_BREEZE_REACT=false
  PACKAGE_IDE_HELPER=false
  PACKAGE_CS_FIXER=false
  LOCAL_TLS=false
  ENVIRONMENTS=''
  AWSLOCAL_PORT='4566'
  MAIL_UI_PORT='8025'
  APP_PORT='80'
  APP_TLS_PORT='443'
  DB_PORT='3306'
  CACHE_PORT='6379'
  PROJECT_DIR=''
  DEV_BRANCH=''
  SPLASH=true

  # parse options

  for var in "$@"
  do
    if [[ "$var" =~ --dev-branch=[a-zA-Z0-9/\.-_]+ ]]; then
      DEV_BRANCH=$(echo $var | sed 's/--dev-branch=//')

      log_message_buffered "Dev branch: $DEV_BRANCH"
    elif [[ "$var" == '--auth=jet-inertia' ]]; then
      AUTH_JET_INERTIA=true

      log_message_buffered "Auth: jetstream inertia (no teams)"
    elif [[ "$var" == '--auth=jet-inertia-teams' ]]; then
      AUTH_JET_INERTIA_TEAMS=true

      log_message_buffered "Auth: jetstream inertia (teams)"
    elif [[ "$var" == '--auth=jet-livewire' ]]; then
      AUTH_JET_LIVEWIRE=true

      log_message_buffered "Auth: jetstream livewire (no teams)"
    elif [[ "$var" == '--auth=jet-livewire-teams' ]]; then
      AUTH_JET_LIVEWIRE_TEAMS=true

      log_message_buffered "Auth: jetstream livewire (teams)"
    elif [[ "$var" == '--auth=breeze-blade' ]]; then
      AUTH_BREEZE_BLADE=true

      log_message_buffered "Auth: breeze (blade)"
    elif [[ "$var" == '--auth=breeze-vue' ]]; then
      AUTH_BREEZE_VUE=true

      log_message_buffered "Auth: breeze (vue)"
    elif [[ "$var" == '--auth=breeze-react' ]]; then
      AUTH_BREEZE_REACT=true

      log_message_buffered "Auth: breeze (react)"
    elif [[ "$var" == '--ide-helper' ]]; then
      PACKAGE_IDE_HELPER=true

      log_message_buffered "Package: IDE helper"
    elif [[ "$var" == '--cs-fixer' ]]; then
      PACKAGE_CS_FIXER=true

      log_message_buffered "Package: code style fixer"
    elif [[ "$var" == '--tls' ]]; then
      LOCAL_TLS=true

      log_message_buffered "Use local TLS"
    elif [[ "$var" =~ --environments=[a-z-]+ ]]; then
      ENVIRONMENTS=$(echo $var | sed 's/--environments=//')

      if [[ "$ENVIRONMENTS" != "local" ]] && [[ "$ENVIRONMENTS" != "local-production" ]] && [[ "$ENVIRONMENTS" != "local-stage-production" ]]; then
        echo -e "${ERROR}Invalid environments option specified${RESET}"

        exit 1
      fi

      log_message_buffered "Environments: $ENVIRONMENTS"
    elif [[ "$var" =~ --awslocal-port=[0-9]+ ]]; then
      AWSLOCAL_PORT=$(echo $var | sed 's/--awslocal-port=//')

      log_message_buffered "Docker-compose port - AWS local: $AWSLOCAL_PORT"
    elif [[ "$var" =~ --mail-ui-port=[0-9]+ ]]; then
      MAIL_UI_PORT=$(echo $var | sed 's/--mail-ui-port=//')

      log_message_buffered "Docker-compose port - mail UI: $MAIL_UI_PORT"
    elif [[ "$var" =~ --app-port=[0-9]+ ]]; then
      APP_PORT=$(echo $var | sed 's/--app-port=//')

      log_message_buffered "Docker-compose port - app: $APP_PORT"
    elif [[ "$var" =~ --app-tls-port=[0-9]+ ]]; then
      APP_TLS_PORT=$(echo $var | sed 's/--app-tls-port=//')

      log_message_buffered "Docker-compose port - app TLS: $APP_TLS_PORT"
    elif [[ "$var" =~ --db-port=[0-9]+ ]]; then
      DB_PORT=$(echo $var | sed 's/--db-port=//')

      log_message_buffered "Docker-compose port - database: $DB_PORT"
    elif [[ "$var" =~ --cache-port=[0-9]+ ]]; then
      CACHE_PORT=$(echo $var | sed 's/--cache-port=//')

      log_message_buffered "Docker-compose port - cache: $CACHE_PORT"
    elif [[ "$var" =~ --project-dir=[a-z.-]+ ]]; then
      PROJECT_DIR=$(echo $var | sed 's/--project-dir=//')

      log_message_buffered "Project directory: $PROJECT_DIR"
    elif [[ "$var" == '--no-splash' ]]; then
      SPLASH=false

      log_message_buffered "Splash: false"
    else
      echo -e "${ERROR}Unknown option '$var' specified${RESET}"

      exit 1
    fi
  done

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

  # check starter pack options

  AUTH_COUNT=0

  if [[ "$AUTH_JET_INERTIA" == true ]]; then
    ((AUTH_COUNT=AUTH_COUNT+1))
  fi

  if [[ "$AUTH_JET_INERTIA_TEAMS" == true ]]; then
    ((AUTH_COUNT=AUTH_COUNT+1))
  fi

  if [[ "$AUTH_JET_LIVEWIRE" == true ]]; then
    ((AUTH_COUNT=AUTH_COUNT+1))
  fi

  if [[ "$AUTH_JET_LIVEWIRE_TEAMS" == true ]]; then
    ((AUTH_COUNT=AUTH_COUNT+1))
  fi

  if [[ "$AUTH_BREEZE_BLADE" == true ]]; then
    ((AUTH_COUNT=AUTH_COUNT+1))
  fi

  if [[ "$AUTH_BREEZE_VUE" == true ]]; then
    ((AUTH_COUNT=AUTH_COUNT+1))
  fi

  if [[ "$AUTH_BREEZE_REACT" == true ]]; then
    ((AUTH_COUNT=AUTH_COUNT+1))
  fi

  if [[ $AUTH_COUNT -gt 1 ]]; then
    echo -e "${ERROR}Auth options are mutually exclusive; you cannot specify more than one${RESET}"
    exit 1
  fi

  echo -e "${SUCCESS}Generating new LaraSurf project '$PROJECT_DIR'...${RESET}"

  # check required ports are open

  nc -vz localhost "$AWSLOCAL_PORT" > /dev/null 2>&1 && echo -e "${ERROR}Specified awslocal port $AWSLOCAL_PORT is not open${RESET}" && exit 1
  echo "Port $AWSLOCAL_PORT is open"

  log_message_buffered "Port open: $AWSLOCAL_PORT"

  nc -vz localhost "$MAIL_UI_PORT" > /dev/null 2>&1 && echo -e "${ERROR}Specified mail UI port $MAIL_UI_PORT is not open${RESET}" && exit 1
  echo "Port $MAIL_UI_PORT is open"

  log_message_buffered "Port open: $MAIL_UI_PORT"

  nc -vz localhost "$APP_PORT" > /dev/null 2>&1 && echo -e "${ERROR}Specified app port $APP_PORT is not open${RESET}" && exit 1
  echo "Port $APP_PORT is open"

  log_message_buffered "Port open: $APP_PORT"

  nc -vz localhost "$DB_PORT" > /dev/null 2>&1 && echo -e "${ERROR}Specified db port $DB_PORT is not open${RESET}" && exit 1
  echo "Port $DB_PORT is open"

  log_message_buffered "Port open: $DB_PORT"

  nc -vz localhost "$CACHE_PORT" > /dev/null 2>&1 && echo -e "${ERROR}Specified cache port $CACHE_PORT is not open${RESET}" && exit 1
  echo "Port $CACHE_PORT is open"

  log_message_buffered "Port open: $CACHE_PORT"

  if [[ "$LOCAL_TLS" == true ]]; then
    nc -vz localhost "$APP_TLS_PORT" > /dev/null 2>&1 && echo -e "${ERROR}Specified app TLS port $APP_TLS_PORT is not open${RESET}" && exit 1
    echo "Port $APP_TLS_PORT is open"

    log_message_buffered "Port open: $APP_TLS_PORT"
  fi

  # clone template project

  if [[ "$PROJECT_DIR" != '.' ]]; then
    if [[ -d "$PROJECT_DIR" ]]; then
      echo -e "${ERROR}Target directory already exists!${RESET}"
      exit 1
    fi

    echo 'Cloning template project...'
    cd $(pwd)
    mkdir "$PROJECT_DIR" && cd "$PROJECT_DIR" && curl --silent "%PROJECT_TEMPLATE_PRESIGNED_URL%" | tar -x
    cd $(pwd)

    if [[ -f "pax_global_header" ]]; then
        rm -f pax_global_header
    fi

    cd $(pwd)
  elif [[ "$PROJECT_DIR" == '.' ]] && [[ -f 'composer.json' ]] && [[ -d 'app' ]]; then
    echo -e "${ERROR}Laravel project already exists!${RESET}"
    exit 1
  fi

  echo -e "$BUFFERED_LOG" >> $LOG_FILE_NAME

  # build installation command

  INSTALL_CMD='composer create-project laravel/laravel /tmp/laravel "8.*" --prefer-dist && echo "Moving files..." && cp -rT /tmp/laravel .'

  if [[ "$AUTH_JET_INERTIA" == true ]] || [[ "$AUTH_JET_INERTIA_TEAMS" == true ]] || [[ "$AUTH_JET_LIVEWIRE" == true ]] || [[ "$AUTH_JET_LIVEWIRE_TEAMS" == true ]]; then
    INSTALL_CMD="$INSTALL_CMD && composer require laravel/jetstream"
  elif [[ "$AUTH_BREEZE_BLADE" == true ]] || [[ "$AUTH_BREEZE_VUE" == true ]] || [[ "$AUTH_BREEZE_REACT" == true ]]; then
    INSTALL_CMD="$INSTALL_CMD && composer require laravel/breeze"
  fi

  if [[ "$AUTH_JET_INERTIA" == true ]]; then
    INSTALL_CMD="$INSTALL_CMD && php artisan jetstream:install inertia"
  elif [[ "$AUTH_JET_INERTIA_TEAMS" == true ]]; then
    INSTALL_CMD="$INSTALL_CMD && php artisan jetstream:install inertia --teams"
  elif [[ "$AUTH_JET_LIVEWIRE" == true ]]; then
    INSTALL_CMD="$INSTALL_CMD && php artisan jetstream:install livewire && php artisan vendor:publish --tag=jetstream-views"
  elif [[ "$AUTH_JET_LIVEWIRE_TEAMS" == true ]]; then
    INSTALL_CMD="$INSTALL_CMD && php artisan jetstream:install livewire --teams && php artisan vendor:publish --tag=jetstream-views"
  elif [[ "$AUTH_BREEZE_BLADE" == true ]]; then
    INSTALL_CMD="$INSTALL_CMD && php artisan breeze:install"
  elif [[ "$AUTH_BREEZE_VUE" == true ]]; then
    INSTALL_CMD="$INSTALL_CMD && php artisan breeze:install vue"
  elif [[ "$AUTH_BREEZE_REACT" == true ]]; then
    INSTALL_CMD="$INSTALL_CMD && php artisan breeze:install react"
  fi

  # @see https://github.com/aws/aws-sdk-php/issues/2264
  INSTALL_CMD="$INSTALL_CMD && composer require league/flysystem-aws-s3-v3 \"~1.0\""

  # todo: remove pinning of psr/log
  # @see https://github.com/barryvdh/laravel-ide-helper/issues/1261
  if [[ "$PACKAGE_IDE_HELPER" == true ]]; then
    INSTALL_CMD="$INSTALL_CMD && composer require psr/log \"^1.0\" && composer require --dev barryvdh/laravel-ide-helper \"^2.0\""
  fi

  if [[ "$PACKAGE_CS_FIXER" == true ]]; then
    INSTALL_CMD="$INSTALL_CMD && composer require --dev friendsofphp/php-cs-fixer \"^3.0\""
  fi

  INSTALL_CMD="$INSTALL_CMD && yarn && yarn upgrade && yarn run dev"

  INSTALL_CMD="$INSTALL_CMD && echo 'Installing LaraSurf...'"

  # install the LaraSurf package from a development branch or a tag

  if [[ -n "$DEV_BRANCH" ]]; then
    INSTALL_CMD="$INSTALL_CMD && echo 'Using dev branch $DEV_BRANCH'"
    INSTALL_CMD="$INSTALL_CMD && composer config repositories.0 vcs https://github.com/larasurf/larasurf && until curl api.github.com --output /dev/null --silent; do : echo 'Waiting for GitHub...' && sleep 1 ; done"
    INSTALL_CMD="$INSTALL_CMD && composer config minimum-stability dev"
    INSTALL_CMD="$INSTALL_CMD && composer config prefer-stable true"
    INSTALL_CMD="$INSTALL_CMD && composer require --dev larasurf/larasurf dev-$DEV_BRANCH"
  else
    INSTALL_CMD="$INSTALL_CMD && composer require --dev larasurf/larasurf \"^0.1\""
  fi

  # build images

  log_message "Building laravel image"

  echo "Building images..."
  cd $(pwd)
  docker-compose build --no-cache laravel

  log_message "Built laravel image"

  # generate project

  log_message "Generation command is: $INSTALL_CMD"

  cd $(pwd)
  echo "Generating project..."
  docker-compose run --rm --no-deps laravel bash -c "$INSTALL_CMD"
  cd $(pwd)

  log_message "Generated project"

  # install TLS certificate if applicable

  if [[ "$TLS_COMMAND" == 'mkcert.exe' ]]; then
    mkcert.exe -install

    log_message "Trusted mkcert certificates"

    cd $(pwd)
    mkcert.exe -key-file .docker/tls/local.pem -cert-file .docker/tls/local.crt localhost

    log_message "Generated mkcert certificate"
  elif [[ "$TLS_COMMAND" == 'mkcert' ]]; then
    mkcert -install

    log_message "Trusted mkcert certificates"

    cd $(pwd)
    mkcert -key-file .docker/tls/local.pem -cert-file .docker/tls/local.crt localhost

    log_message "Generated mkcert certificate"
  fi

  # write ports to environment files for docker-compose to pick up

  cat << EOF >> '.env.example'

# LOCAL ONLY: LaraSurf docker-compose ports
SURF_AWSLOCAL_PORT=4566
SURF_MAIL_UI_PORT=8025
SURF_APP_PORT=80
SURF_APP_TLS_PORT=443
SURF_DB_PORT=3306
SURF_CACHE_PORT=6379
SURF_USER_ID=1000
EOF

  log_message "Created .env.example file"

  cat << EOF >> '.env'

# LOCAL ONLY: LaraSurf docker-compose ports
SURF_AWSLOCAL_PORT=$AWSLOCAL_PORT
SURF_MAIL_UI_PORT=$MAIL_UI_PORT
SURF_APP_PORT=$APP_PORT
SURF_APP_TLS_PORT=$APP_TLS_PORT
SURF_DB_PORT=$DB_PORT
SURF_CACHE_PORT=$CACHE_PORT
SURF_USER_ID=$SURF_USER_ID
EOF

  log_message "Created .env file"

  # generate a random ID for the project

  PROJECT_ID=$(awk 'BEGIN{srand(); print int(100000+rand()*(999999-100001))}')

  # write the default larasurf.json configuration file

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

  if [[ "$ENVIRONMENTS" == 'local-stage-production' ]] || [[ "$ENVIRONMENTS" == 'local-production' ]] ; then
    POST_INSTALL_CMD="$POST_INSTALL_CMD --cloudformation --proxies"
  fi

  if [[ "$LOCAL_TLS" == true ]]; then
    POST_INSTALL_CMD="$POST_INSTALL_CMD --nginx-local-tls"
  fi

  if grep -q '"friendsofphp/php-cs-fixer"' 'composer.json'; then
    POST_INSTALL_CMD="$POST_INSTALL_CMD --cs-fixer"
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

  docker-compose down --volumes

  log_message "Services stopped"
  log_message "Starting services"

  cd $(pwd)

  docker-compose up -d
  cd $(pwd)

  log_message "Starting started"

  log_message "Waiting for DB to respond"

  # wait for the database to respond

  until curl localhost:$DB_PORT --http0.9 --output /dev/null --silent
  do
      {
        echo 'Waiting for database to be ready...'
        ((COUNT++)) && ((COUNT==20)) && echo -e "${ERROR}Could not connect to database after 20 tries!${RESET}" && log_message "Database never responded" && exit 1
        sleep 3
      } 1>&2
  done

  log_message "Database responded"

  echo 'Database is ready!'

  # execute the post installation command

  log_message "Post generation command: $POST_INSTALL_CMD"

  cd $(pwd)

  docker-compose exec -T laravel bash -c "$POST_INSTALL_CMD" && cd $(pwd)

  # ensure surf CLI script is executable

  log_message "Post generation command run"

  cd $(pwd)

  chmod +x vendor/larasurf/larasurf/bin/surf.sh

  log_message "surf.sh chmod"

  # make initial commit

  if [[ ! -d '.git' ]]; then
    git init

    log_message "Initialized git repository"

    cd $(pwd)
    git add .

    log_message "Staged files for commit"

    cd $(pwd)

    git commit -q -m 'larasurf project generation'

    log_message "Made initial commit"

    cd $(pwd)
    git branch -M main

    log_message "Renamed master to main"
  else
    git add .

    log_message "Staged files for commit"

    cd $(pwd)
    git commit -q -m 'larasurf installation'

    log_message "Made initial commit"
  fi

  cd $(pwd)

  # make initial branches if applicable

  if [[ "$ENVIRONMENTS" == 'local-stage-production' ]] && [[ -z "$(git branch -l stage)" ]] && [[ -z "$(git branch -l develop)" ]]; then
    git checkout -b stage

    log_message "Checked out stage branch"

    cd $(pwd)
    git checkout -b develop

    log_message "Checked out develop branch"
  elif [[ "$ENVIRONMENTS" == 'local-production' ]] && [[ -z "$(git branch -l develop)" ]]; then
    git checkout -b develop

    log_message "Checked out develop branch"
  fi

  # rebuild webserver image if applicable

  if [[ "$LOCAL_TLS" == true ]]; then
    cd $(pwd)
    log_message "Rebuilding webserver image"

    docker-compose build --no-cache webserver

    log_message "Webserver image rebuilt"

    log_message "Recreating services"

    cd $(pwd)
    docker-compose up --force-recreate -d

    log_message "Services recreated"
  fi

  echo -e "${SUCCESS}Project generation complete${RESET}"

  log_message "Project generation complete"

  # display the splash screen

  if [[ "$SPLASH" == true ]]; then
    cd $(pwd)
    docker-compose exec -T laravel php artisan larasurf:splash
  fi
}

surf_install "$@"
