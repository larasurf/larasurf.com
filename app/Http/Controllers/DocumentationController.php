<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentationController extends Controller
{
    protected $default_version = '0.1';

    protected $documentation = [
        '0.1' => [
            [
                'title' => 'Overview',
                'id' => 'overview',
                'content' => [
                    [
                        'type' => 'heading-1',
                        'text' => 'Introduction',
                        'id' => 'overview-introduction',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'Greetings, fellow artisan, and welcome to LaraSurf!',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'Your journey of rapidly implementing, deploying, and iterating on your next Laravel project with pre-built features begins here.',
                    ],
                    [
                        'type' => 'callout',
                        'html' => 'While we <strong>highly recommend</strong> reading the documentation in its entirety before getting started, you can check out the <a href="#tldr-checklist">TL;DR Checklist</a> to guide you through local setup and launch within 90 minutes.',
                    ],
                    [
                        'type' => 'heading-2',
                        'text' => 'What is LaraSurf?',
                        'id' => 'overview-introduction-what-is-larasurf',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'LaraSurf is an opinionated end-to-end solution for Laravel projects that assists with local development (using Docker), cloud infrastructure (on AWS), and CI/CD pipelines (using CircleCI).',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'An important thing to note is that LaraSurf was built upon Laravel but is not part of the official Laravel ecosystem.',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'While the Laravel ecosystem and what LaraSurf accomplishes may have some overlap, LaraSurf focuses on automating integrations between multiple technologies and providing a developer with everything they need to start a new project with growth and scale in mind.',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'An overview of the LaraSurf solution is outlined in the Venn diagram below:',
                    ],
                    [
                        'type' => 'image',
                        'src' => '/img/venn-diagram.png',
                        'alt' => 'LaraSurf Overview',
                        'class' => 'w-full',
                    ],
                    [
                        'type' => 'heading-2',
                        'text' => 'Why?',
                        'id' => 'overview-introduction-why',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'LaraSurf was born out of the desire to quickly spin up and deploy Laravel applications without having to repeat routine tasks such as setting up local and cloud environments and CI/CD pipelines (every. single. time.). It\'s a turnkey solution for hitting the ground running with a fresh Laravel application in a matter of hours instead of days (or weeks).',
                    ],
                    [
                        'type' => 'heading-2',
                        'text' => 'Mission',
                        'id' => 'overview-introduction-mission',
                    ],
                    [
                        'type' => 'quote',
                        'html' => 'To provide an end to end solution for new small to medium sized Laravel projects, lowering the barrier of entry for making it to the production and iteration phases of a project, as well as providing tools to enable rapid prototyping and implementation.',
                    ],
                    [
                        'type' => 'heading-2',
                        'text' => 'Audience',
                        'id' => 'overview-introduction-audience',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'LaraSurf is intended for Laravel developers looking to kickstart their next application and simplify environment prerequisites and interactions.',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'To feel comfortable using LaraSurf, you should have at least moderate familiarity with the following concepts:',
                    ],
                    [
                        'type' => 'list',
                        'items' => [
                            'Using a Terminal',
                            'Laravel Development',
                            'Containers',
                            'Common Amazon Web Services',
                        ],
                    ],
                    [
                        'type' => 'heading-2',
                        'text' => 'Guiding Principles',
                        'id' => 'overview-introduction-guiding-principles',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'LaraSurf was created with the following principles in mind:',
                    ],
                    [
                        'type' => 'list',
                        'items' => [
                            'Customizing the infrastructure and CI/CD pipelines for LaraSurf projects should be supported',
                            'Laravel-provided authentication starter kits should be supported',
                            'Natively installed software for a local development environment should be limited as much as possible',
                            'AWS and CircleCI web console interaction should be limited as much as possible',
                            'Automation should be heavily preferred when possible',
                            'Application environments should match as closely as possible',
                        ],
                    ],
                    [
                        'type' => 'heading-1',
                        'text' => 'Features',
                        'id' => 'features',
                    ],
                    [
                        'type' => 'heading-2',
                        'text' => 'Project Generation',
                        'id' => 'overview-features-project-generation',
                    ],
                    [
                        'type' => 'list',
                        'items' => [
                            'Specify project environment(s)',
                            [
                                'Local',
                                'Local and Production',
                                'Local, Stage, and Production',
                            ],
                            'Ready-to-go dockerized local development environment',
                            'Update .gitignore',
                            'Update .gitignore',
                            'Optionally specify an authentication scaffolding package',
                            'Optionally specify an authentication starter kit',
                            'Optionally install (and run) Laravel IDE Helper',
                            'Optionally install (and run) a Code Style Fixer',
                            'Optionally install (and run) a Code Style Fixer',
                            'Optionally generate and install a local TLS certificate',
                            'Automatically install composer dependencies',
                            'Automatically configure the project for using AWS services',
                            'Automatically install and build JavaScript dependencies',
                            'Automatically install the LaraSurf development package',
                            'Automatically create environment branches',
                            'Automatically start the local environment',
                        ],
                    ],
                    [
                        'type' => 'heading-2',
                        'text' => 'Local Development',
                        'id' => 'overview-features-local-development',
                    ],
                    [
                        'type' => 'list',
                        'items' => [
                            'Preconfigured Docker-Compose services',
                            [
                                'NGINX service',
                                'PHP-FPM service (PHP 8)',
                                'MySQL 8 service',
                                'Redis service',
                                'LocalStack service (local AWS)',
                                'AWS CLI service',
                                'MailHog service (local mock SMTP server)',
                            ],
                            'LaraSurf CLI tool',
                            [
                                'Run composer commands',
                                'Run yarn commands',
                                'Run artisan commands',
                                'Run AWS CLI commands against LocalStack',
                                'Refresh the database and local S3 bucket',
                                'Run PHPUnit',
                            ],
                        ],
                    ],
                    [
                        'type' => 'heading-2',
                        'text' => 'Cloud Infrastructure',
                        'id' => 'overview-features-cloud-infrastructure',
                    ],
                    [
                        'type' => 'list',
                        'items' => [
                            'Manage application secrets in SSM Parameter Store',
                            'Create container image repositories',
                            'Deploy cloud infrastructure',
                            'Enable SES sending and DKIM verification',
                            'Issue and verify ACM certificates',
                            'Manage application and database access',
                            'Run artisan commands on cloud environments',
                            'Run artisan tinker on cloud environments',
                        ],
                    ],
                    [
                        'type' => 'heading-2',
                        'text' => 'CI/CD',
                        'id' => 'overview-features-cicd',
                    ],
                    [
                        'type' => 'list',
                        'items' => [
                            'Build and publish container images for the application and webserver',
                            'Run feature and unit tests',
                            'Scan for known vulnerabilities in container images and dependencies',
                            'Deploy application changes upon merging into an environment branch',
                        ],
                    ],
                    [
                        'type' => 'heading-1',
                        'text' => 'Technology',
                        'id' => 'overview-technology',
                    ],
                    [
                        'type' => 'heading-2',
                        'text' => 'Application Assumptions',
                        'id' => 'overview-technology-application-assumptions',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'It is assumed that every LaraSurf project will have the following needs and/or characteristics',
                    ],
                    [
                        'type' => 'heading-2',
                        'text' => 'Version Control',
                        'id' => 'overview-technology-version-control',
                    ],
                    [
                        'type' => 'list',
                        'items' => [
                            'A local development environment and optional stage or stage and production environments',
                            'Git for version control and GitHub for the repositories origin',
                            'A simplified version of GitFlow for branch management',
                            [
                                'See the <a href="#project-lifecycle">Project Lifecycle</a>',
                            ],
                        ],
                    ],
                    [
                        'type' => 'heading-2',
                        'text' => 'Continuous Integration and Delivery',
                        'id' => 'overview-technology-continuous-integration-and-delivery',
                    ],
                    [
                        'type' => 'list',
                        'items' => [
                            'CircleCI for CI/CD pipleines',
                            'Unit and feature tests must pass before progressing through the pipeline',
                            'Scanning for known security vulnerabilities in container images and dependencies',
                            'Automated image building and deployments for specific branches (<span class="inline-code">stage</span> or <span class="inline-code">main</span>)',
                        ],
                    ],
                    [
                        'type' => 'heading-2',
                        'text' => 'Infrastructure and Software',
                        'id' => 'overview-technology-infrastructure-and-software',
                    ],
                    [
                        'type' => 'list',
                        'items' => [
                            'TLS for HTTPS ingress',
                            [
                                'Terminated at NGNIX level locally',
                                'Terminated at ELB level on all other environments',
                                'HTTP redirected to HTTPS',
                            ],
                            'MySQL 8 for the database',
                            [
                                'Official Docker image locally',
                                'RDS on AWS',
                            ],
                            'S3 for dynamic file storage',
                            [
                                'LocalStack service locally',
                            ],
                            'SQS for queued messages',
                            [
                                'LocalStack service locally',
                            ],
                            'Scheduled tasks',
                            [
                                'Via CloudWatch events for non-local environments',
                            ],
                            'Caching using Redis',
                            [
                                'Official Docker image locally',
                                'ElastiCache on AWS',
                            ],
                            'Email sending',
                            [
                                'Using MailHog locally',
                                'Using MailTrap for stage',
                                'Using SES for production',
                            ],
                            'Application Secrets',
                            [
                                'Via <span class="inline-code">.env</span> file locally',
                                'Via Environment Variables injected from SSM Parameter Store for non-local environments',
                            ],
                            'DNS entry for the Load Balancer',
                            [
                                'Route53 on AWS',
                            ],
                            'Modest AutoScaling on ECS Fargate',
                            [
                                'Non-local environments',
                            ],
                        ],
                    ],
                    [
                        'type' => 'heading-2',
                        'text' => 'Stack',
                        'id' => 'overview-technology-stack',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'LaraSurf, in one form or another, uses the following technologies.',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => '<i>This may not be an exhaustive list.</i>',
                    ],
                    [
                        'type' => 'list',
                        'items' => [
                            'Laravel',
                            'MailHog',
                            'NGINX',
                            'PHP-FPM',
                            [
                                'PHP 8',
                            ],
                            'MySQL 8',
                            'Redis',
                            'LocalStack',
                            'Docker and Docker-Compose',
                            'CircleCI',
                            'AWS CLI v2',
                            'Amazon Web Services',
                            [
                                'Elastic Container Service',
                                'Elastic Container Registry',
                                'Simple Storage Service',
                                'Simple Queue Service',
                                'Relational Database Service',
                                'Simple Email Service',
                                'ElastiCache',
                                'CloudWatch',
                                'CloudWatch Logs',
                                'Amazon Certificate Manager',
                                'Route53',
                                'Systems Manager Parameter Store',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'TL;DR Checklist',
                'id' => 'tldr-checklist',
                'content' => [
                    [
                        'type' => 'paragraph',
                        'html' => 'The following is a TL;DR checklist for:'
                    ],
                    [
                        'type' => 'list',
                        'items' => [
                            'generating a new project',
                            'deploying to a stage environment',
                            'deploying to a production environment',
                        ],
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'We <strong>strongly encourage</strong> you to read the documentation in its entirety before getting started.',
                    ],
                    [
                        'type' => 'callout',
                        'html' => 'This checklist assumes you have completed all prerequisites so be sure you have read and done everything required as described in the <a href="#prerequisites">Prerequisites</a> section.'
                    ],
                    [
                        'type' => 'heading-1',
                        'text' => 'Generating a New Project',
                        'id' => 'tldr-checklist-generating-a-new-project',
                    ],
                    [
                        'type' => 'checkbox',
                        'html' => 'Generate a new Project using the command from <a href="/new" target="_blank">larasurf.com/new</a>',
                    ],
                    [
                        'type' => 'checkbox',
                        'html' => 'Alias the <span class="inline-code">surf</span> command if you have not already done so',
                    ],
                    [
                        'type' => 'code',
                        'class' => 'code-checklist',
                        'text' => '([[ -f ~/.bash_profile ]] && echo "alias surf=\'vendor/larasurf/larasurf/bin/surf.sh\'" >> ~/.bash_profile || (echo "source ~/.bashrc" >> ~/.bash_profile && echo "alias surf=\'vendor/larasurf/larasurf/bin/surf.sh\'" >> ~/.bash_profile)) && source ~/.bash_profile',
                    ],
                    [
                        'type' => 'checkbox',
                        'html' => 'Create a <a href="https://github.com/new" target="_blank">new GitHub repository</a> for your project, whose name should exactly match the project name (slug) of your LaraSurf project and be in lowercase. If you are unsure of this value, you can run the following command to get the project name: <span class="inline-code">surf config get project-name</span>.',
                    ],
                    [
                        'type' => 'checkbox',
                        'html' => 'Set remote origin',
                    ],
                    [
                        'type' => 'code',
                        'class' => 'code-checklist',
                        'text' => 'git remote add origin git@github.com:my-org/my-project.git',
                    ],
                    [
                        'type' => 'checkbox',
                        'html' => 'Push up the <span class="inline-code">develop</span> branch',
                    ],
                    [
                        'type' => 'code',
                        'class' => 'code-checklist',
                        'text' => 'git push -u origin develop',
                    ],
                    [
                        'type' => 'checkbox',
                        'html' => 'Setup the <a href="https://app.circleci.com/projects" target="_blank">new project on CircleCI</a>',
                    ],
                    [
                        'type' => 'checkbox',
                        'html' => 'Create a <a href="https://app.circleci.com/settings/user/tokens" target="_blank">new Personal API Token on CircleCI</a>',
                    ],
                    [
                        'type' => 'checkbox',
                        'html' => 'Configure LaraSurf with the CircleCI personal API token',
                    ],
                    [
                        'type' => 'code',
                        'class' => 'code-checklist',
                        'text' => 'surf circleci set-api-key/my-project.git',
                    ],
                    [
                        'type' => 'checkbox',
                        'html' => 'Configure the AWS CLI if you have not already done so',
                    ],
                    [
                        'type' => 'code',
                        'class' => 'code-checklist',
                        'text' => 'surf aws configure',
                    ],
                    [
                        'type' => 'heading-1',
                        'text' => 'Deploy to Stage',
                        'id' => 'tldr-checklist-deploy-to-stage',
                    ],
                    [
                        'type' => 'checkbox',
                        'html' => 'Create the container image repositories on AWS ECR',
                    ],
                    [
                        'type' => 'code',
                        'class' => 'code-checklist',
                        'text' => 'surf cloud-images create-repos --environment stage',
                    ],
                    [
                        'type' => 'checkbox',
                        'html' => 'Commit and push the changes to the <span class="inline-code">develop</span> branch',
                    ],
                    [
                        'type' => 'code',
                        'class' => 'code-checklist',
                        'text' => 'git add .',
                    ],
                    [
                        'type' => 'code',
                        'class' => 'code-checklist',
                        'text' => 'git commit -m "[skip ci] larasurf init stage"',
                    ],
                    [
                        'type' => 'code',
                        'class' => 'code-checklist',
                        'text' => 'git push',
                    ],
                    [
                        'type' => 'checkbox',
                        'html' => 'Build the container images for the Stage environment using CircleCI',
                    ],
                    [
                        'type' => 'code',
                        'class' => 'code-checklist',
                        'text' => 'git checkout stage',
                    ],
                    [
                        'type' => 'code',
                        'class' => 'code-checklist',
                        'text' => 'git merge develop',
                    ],
                    [
                        'type' => 'code',
                        'class' => 'code-checklist',
                        'text' => 'git push -u origin stage',
                    ],
                    [
                        'type' => 'checkbox',
                        'html' => 'Create the stack using AWS CloudFormation',
                    ],
                    [
                        'type' => 'code',
                        'class' => 'code-checklist',
                        'text' => 'surf cloud-stacks create --environment stage',
                    ],
                    [
                        'type' => 'checkbox',
                        'html' => 'Configure the Stage environment to use MailTrap',
                    ],
                    [
                        'type' => 'code',
                        'class' => 'code-checklist',
                        'text' => 'surf cloud-vars put --enviornment stage --key MAIL_HOST --value smtp.mailtrap.io',
                    ],
                    [
                        'type' => 'code',
                        'class' => 'code-checklist',
                        'text' => 'surf cloud-vars put --environment stage --key MAIL_PORT --value 2525',
                    ],
                    [
                        'type' => 'code',
                        'class' => 'code-checklist',
                        'text' => 'surf cloud-vars put --environment stage --key MAIL_USERNAME --value <your SMTP username>',
                    ],
                    [
                        'type' => 'code',
                        'class' => 'code-checklist',
                        'text' => 'surf cloud-vars put --enviornment stage --key MAIL_PASSWORD --value <your SMTP password>',
                    ],
                    [
                        'type' => 'code',
                        'class' => 'code-checklist',
                        'text' => 'surf cloud-vars put --environment stage --key MAIL_ENCRYPTION --value tls',
                    ],
                    [
                        'type' => 'heading-1',
                        'text' => 'Deploy to Production',
                        'id' => 'tldr-checklist-deploy-to-stage',
                    ],
                    [
                        'type' => 'checkbox',
                        'html' => 'Create the container image repositories on AWS ECR',
                    ],
                    [
                        'type' => 'code',
                        'class' => 'code-checklist',
                        'text' => 'git checkout develop',
                    ],
                    [
                        'type' => 'code',
                        'class' => 'code-checklist',
                        'text' => 'surf cloud-images create-repos --environment production',
                    ],
                    [
                        'type' => 'checkbox',
                        'html' => 'Commit and push the changes to the <span class="inline-code">develop</span> branch',
                    ],
                    [
                        'type' => 'code',
                        'class' => 'code-checklist',
                        'text' => 'git add .',
                    ],
                    [
                        'type' => 'code',
                        'class' => 'code-checklist',
                        'text' => 'git commit -m "[skip ci] larasurf init production"',
                    ],
                    [
                        'type' => 'code',
                        'class' => 'code-checklist',
                        'text' => 'git push',
                    ],
                    [
                        'type' => 'checkbox',
                        'html' => 'Build the container images for the Production environment using CircleCI',
                    ],
                    [
                        'type' => 'code',
                        'class' => 'code-checklist',
                        'text' => 'git checkout stage',
                    ],
                    [
                        'type' => 'code',
                        'class' => 'code-checklist',
                        'text' => 'git merge develop',
                    ],
                    [
                        'type' => 'code',
                        'class' => 'code-checklist',
                        'text' => 'git push',
                    ],
                    [
                        'type' => 'code',
                        'class' => 'code-checklist',
                        'text' => 'git checkout main',
                    ],
                    [
                        'type' => 'code',
                        'class' => 'code-checklist',
                        'text' => 'git merge stage',
                    ],
                    [
                        'type' => 'code',
                        'class' => 'code-checklist',
                        'text' => 'git push -u origin main',
                    ],
                    [
                        'type' => 'checkbox',
                        'html' => 'Create the stack using AWS CloudFormation',
                    ],
                    [
                        'type' => 'code',
                        'class' => 'code-checklist',
                        'text' => 'surf cloud-stacks create --environment production',
                    ],
                    [
                        'type' => 'checkbox',
                        'html' => 'Verify the production domain for email sending',
                    ],
                    [
                        'type' => 'code',
                        'class' => 'code-checklist',
                        'text' => 'surf cloud-emails verify domain --environment production',
                    ],
                    [
                        'type' => 'checkbox',
                        'html' => 'Request to get out of the AWS SES sandbox if not already done so',
                    ],
                    [
                        'type' => 'code',
                        'class' => 'code-checklist',
                        'text' => 'surf cloud-emails enable-sending',
                    ],
                    [
                        'type' => 'checkbox',
                        'html' => 'Allow public ingress for the application',
                    ],
                    [
                        'type' => 'code',
                        'class' => 'code-checklist',
                        'text' => 'surf cloud-ingress allow --environment production --type application --source public',
                    ],
                ],
            ],
            [
                'title' => 'Project Lifecycle',
                'id' => 'project-lifecycle',
                'content' => [
                    [
                        'type' => 'heading-1',
                        'text' => 'Introduction',
                        'id' => 'project-lifecycle-introduction',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'The recommend project lifecycle for a LaraSurf project is intended to be as simple as possible.',
                    ],
                    [
                        'type' => 'callout',
                        'html' => 'This document assumes you intend to have both a Stage and Production environment. If you only want Production, the same concepts apply without a Stage environment. If you want a local environment, you can ignore steps related to other environments.',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'The diagram below outlines the typical phases of a LaraSurf project, from project generation to production, and beyond to iteration.',
                    ],
                    [
                        'type' => 'image',
                        'src' => '/img/project-lifecycle.png',
                        'alt' => 'LaraSurf Project Lifecycle',
                        'class' => 'w-full lg:w-1/2'
                    ],
                    [
                        'type' => 'heading-1',
                        'text' => 'Project Generation',
                        'id' => 'project-lifecycle-project-generation',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'LaraSurf projects begin by running a custom command in your terminal which cURLs a Bash script. At the end of the project generation process you will be setup to immediately begin implementation (or deploy the default project to stage/production if you so choose).',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'For more information, see the <a href="#project-generation">Project Generation</a> documentation.',
                    ],
                    [
                        'type' => 'heading-1',
                        'text' => 'Infrastructure Deployment',
                        'id' => 'project-lifecycle-infrastructure-deployment',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'Infrastructure for LaraSurf projects can be deployed using a few simple commands, with the bulk of the heavy lifting done by a predefined AWS CloudFormation template.',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'Deployment of infrastructure can be done at any time; you are free to work on your project locally for as long as you like before creating infrastructure for and deploying to Stage and/or Production.',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'Ingress into either environment\'s application or database can be changed at will using single commands.',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'For more information, see the <a href="#cloud-environments">Cloud Environments</a> documentation.',
                    ],
                    [
                        'type' => 'heading-2',
                        'text' => 'Stage',
                        'id' => 'project-lifecycle-infrastructure-deployment-stage',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'The Stage environment is intended to be the pre-production environment where testing for Quality Assurance takes place. The application and webserver versions deployed to the Stage environment represent how the system will behave on Production after the next Production deployment.',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'A Stage environment is also optional. If you intended to have only a Production environment (or only a local environment), you are free to specify this during your project generation process.',
                    ],
                    [
                        'type' => 'callout',
                        'html' => 'The default LaraSurf setup assumes you will be using a mock SMTP server such as MailTrap and configures your application accordingly.<br/>You are of course free to send live emails from your Stage environment using SES or any other mechanism by Laravel instead.',
                    ],
                    [
                        'type' => 'heading-2',
                        'text' => 'Production',
                        'id' => 'project-lifecycle-infrastructure-deployment-production',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'The Production environment is your live application accessible to your target audience. Typically this environment will be publicly accessible, but it doesn\'t have to be.',
                    ],
                    [
                        'type' => 'heading-1',
                        'text' => 'Local Development',
                        'id' => 'project-lifecycle-local-development',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'Implementation for LaraSurf projects is intended to take place on a local machine with Docker support. Using Docker Compose to define local services, a complete development environment for LaraSurf projects is available out of the box. This setup includes the necessary tools to locally run and interact with your application with room to be customized if needed.',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'For more information, see the <a href="#local-development">Local Development</a> documentation.',
                    ],
                    [
                        'type' => 'heading-2',
                        'text' => 'Branching Pattern',
                        'id' => 'project-lifecycle-local-development-branching-pattern',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'The recommended branching pattern for LaraSurf projects is a simplified version of GitFlow.',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'Depending on your configured environments, there are up to three branches created for you as part of the project generation process.',
                    ],
                    [
                        'type' => 'list',
                        'items' => [
                            'For Local only projects, the <span class="inline-code">main</span> branch is created',
                            'For Local and Production projects, the <span class="inline-code">main</span> and <span class="inline-code">develop</span> branches are created',
                            'For Local, Stage, and Production projects, the <span class="inline-code">main</span>, <span class="inline-code">stage</span> and <span class="inline-code">develop</span> branches are created',
                        ],
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'The purpose of each branch is as follows:',
                    ],
                    [
                        'type' => 'list',
                        'items' => [
                            '<span class="inline-code">main</span> is what\'s currently deployed to the Production environment',
                            '<span class="inline-code">stage</span> is what\'s currently deployed to the Stage environment',
                            '<span class="inline-code">develop</span> is for completed features and bugfixes that you don\'t want deployed to the Stage environment yet',
                        ],
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'In addition the these three branches, additional branches are created as part of the development process:',
                    ],
                    [
                        'type' => 'list',
                        'items' => [
                            '<span class="inline-code">feature/*</span> branches are for adding new features to your application',
                            [
                                'branched off of and merged back into the <span class="inline-code">develop</span> branch',
                            ],
                            '<span class="inline-code">bugfix/*</span> branches are for fixing bugs in your application that either haven\'t made it to the Production environment yet or aren\'t a high priority',
                            [
                                'branched off of the <span class="inline-code">develop</span> or <span class="inline-code">stage</span> branch and merged into either <span class="inline-code">develop</span> or both <span class="inline-code">stage</span> and <span class="inline-code">develop</span> depending on the parent branch',
                            ],
                            '<span class="inline-code">hotfix/*</span> branches are for fixing critical bugs that exist in the Production environment',
                            [
                                'branched off of and merged back into the <span class="inline-code">main</span> branch',
                            ],
                        ],
                    ],
                    [
                        'type' => 'callout',
                        'html' => 'While it is recommended every merge take place on GitHub to allow for easier code review, it is not a requirement.',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'The diagram below outlines an example branch history as time moves forwards. Assume the cloud infrastructure for both the Stage and Production environments was deployed immediately after project generation.',
                    ],
                    [
                        'type' => 'image',
                        'src' => '/img/branching-pattern.png',
                        'alt' => 'LaraSurf Branching Pattern',
                        'class' => 'w-full'
                    ],
                    [
                        'type' => 'heading-1',
                        'text' => 'CircleCI Pipeline',
                        'id' => 'project-lifecycle-circleci-pipeline',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'LaraSurf projects use CircleCI workflows to automatically run Unit and Feature tests, scan for known vulnerabilities, build container images, publish container images, and deploy new versions of the application and webserver.',
                    ],
                    [
                        'type' => 'callout',
                        'html' => 'The default CircleCI workflows will work for most use cases but you are free to modify the configuration file to suit any additional needs.',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'By default, Unit and Feature tests are run on every branch that is pushed up to GitHub. In addition, for the <span class="inline-code">stage</span> and <span class="inline-code">main</span> branches, container images are built, scanned for known vulnerabilities, published to AWS Elastic Container Registry, and deployed to the appropriate environment.',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'For more information, see the <a href="#circleci-pipeline">CircleCI Pipeline</a> documentation.',
                    ],
                ],
            ],
            [
                'title' => 'Prerequisites',
                'id' => 'prerequisites',
                'content' => [
                    [
                        'type' => 'paragraph',
                        'html' => 'LaraSurf currently only supports new projects that have been generated by LaraSurf (though you are free to look through the source if you want inspiration for an existing project).',
                    ],
                    [
                        'type' => 'heading-1',
                        'text' => 'Accounts',
                        'id' => 'prerequisites-accounts',
                    ],
                    [
                        'type' => 'list',
                        'items' => [
                            'A <a href="https://github.com/signup" target="_blank">GitHub account</a> is required for hosting your Git repository',
                            [
                                'A configured SSH key is required for cloning the template project',
                            ],
                            'A <a href="https://hub.docker.com/signup" target="_blank">Docker Hub account</a> is required to pull container images',
                            'A <a href="https://circleci.com/signup" target="_blank">CircleCI account</a> is required for running CI/CD pipelines',
                            'An <a href="https://aws.amazon.com" target="_blank">AWS account</a> is required for cloud infrastructure',
                            'An <a href="https://mailtrap.io/register/signup" target="_blank">MailTrap account</a> is optional, but recommended for a Stage environment',
                        ],
                    ],
                    [
                        'type' => 'heading-1',
                        'text' => 'Software',
                        'id' => 'prerequisites-software',
                    ],
                    [
                        'type' => 'list',
                        'items' => [
                            'You must be running MacOS or WSL2 on Windows',
                            'Your terminal must have bash support',
                            [
                                'For MacOS, <a href="https://iterm2.com/" target="_blank">iTerm2</a> is recommended',
                            ],
                            'cURL must be installed',
                            'Netcat must be installed',
                            '<a href="https://www.docker.com/products/docker-desktop" target="_blank">Docker Desktop</a> must be installed',
                            [
                                'The v2 CLI in experimental settings should <strong>not</strong> be enabled'
                            ],
                            'Git must be installed',
                            [
                                'A global user name must be configured',
                                'A global user email must be configured',
                            ],
                            '<a href="https://github.com/FiloSottile/mkcert" target="_blank">Mkcert</a> is required if you want local TLS support',
                            [
                                'On Windows, the executable must be named <span class="inline-code">mkcert.exe</span> and be accessible via your system <span class="inline-code">PATH</span>'
                            ]
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Project Generation',
                'id' => 'project-generation',
                'content' => [
                    [
                        'type' => 'paragraph',
                        'html' => 'The LaraSurf project generation process is designed to allow artisans to hit the ground running. Monotonous tasks for project setup have been automated; just kick off the project generation and go make a cup of coffee. Within 10-15 minutes your development environment will be ready and implementation can begin.',
                    ],
                    [
                        'type' => 'heading-1',
                        'text' => 'Generation Steps',
                        'id' => 'project-generation-steps',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'LaraSurf\'s project generation process is nothing more than a command run in your terminal that:',
                    ],
                    [
                        'type' => 'list',
                        'items' => [
                            'cURLs a bash script with specific project generation options',
                            'changes directories into the new project directory',
                            'displays the time elapsed',
                            'runs <span class="inline-code">git status</span>',
                        ],
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'Within the cURLed bash script, there are three main steps to the process:',
                    ],
                    [
                        'type' => 'list',
                        'list-type' => 'ordered',
                        'items' => [
                            'Pre-Installation',
                            'Installation',
                            'Post-Installation',
                        ],
                    ],
                    [
                        'type' => 'heading-2',
                        'text' => 'Pre-Installation',
                        'id' => 'project-generation-steps-pre-installation',
                    ],
                    [
                        'type' => 'list',
                        'items' => [
                            'First, LaraSurf will verify needed software is installed and all needed ports for Docker Compose services are open',
                            'Then git is used to clone a pre-dockerized repository template from Github',
                            'Finally, the PHP-FPM and NGINX container images are built',
                        ],
                    ],
                    [
                        'type' => 'heading-2',
                        'text' => 'Installation',
                        'id' => 'project-generation-steps-installation',
                    ],
                    [
                        'type' => 'list',
                        'items' => [
                            'Installation begins with the creation of a new Laravel project using Composer',
                            'After the project is created, Composer dependencies are installed',
                            'If specified, the selected front end stack are installed',
                            'AWS dependencies are installed',
                            'If specified, the <span class="inline-code">barryvdh/laravel-ide-helper</span> and/or <span class="inline-code">friendsofphp/php-cs-fixer</span> packages are installed',
                            'Then, front end dependencies are installed and transpiled',
                            'Finally, the <span class="inline-code">larasurf/larasurf</span> package is installed',
                        ],
                    ],
                    [
                        'type' => 'heading-2',
                        'text' => 'Post-Installation',
                        'id' => 'project-generation-steps-post-installation',
                    ],
                    [
                        'type' => 'list',
                        'items' => [
                            'As the first step of post-installation, a local TLS certificate is created and trusted if local TLS is specified in the project generation options',
                            'Next, a default <span class="inline-code">larasurf.json</span> configuration file is created',
                            'Both the <span class="inline-code">.env</span> and <span class="inline-code">.env.example</span> files are updated to reflect changes to configuration',
                            'If applicable, a CircleCI configuration file is published',
                            'If applicable, an AWS CloudFormation template is published',
                            'The <span class="inline-code">.gitignore</span> file is overwritten',
                            'A health check route is created',
                            'The <span class="inline-code">TrustProxies</span> middleware is updated to trust all proxies',
                            'The local NGINX configuration is updated if local TLS was selected',
                            'If applicable, a default code style definition file is published',
                            'Database migrations are run for the local MySQL database',
                            'If applicable, IDE Helper files are generated',
                            'If applicable, code style fixing is run',
                            'The LaraSurf CLI script is updated to be executable',
                            'A git repository is initialized, an initial commit is made, the <span class="inline-code">master</span> branch is renamed to <span class="inline-code">main</span>, and if applicable, a <span class="inline-code">stage</span> and/or <span class="inline-code">develop</span> branch is created',
                            'Finally, if required, the NGINX container image is rebuilt',
                        ],
                    ],
                    [
                        'type' => 'heading-1',
                        'text' => 'Generating a New Project',
                        'id' => 'project-generation-new-project',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'In order to generate a new LaraSurf project, visit <a href="/new" target="_blank">larasurf.com/new</a> in your browser.',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'Enter your project name, select your desired configuration options, copy the displayed command into your terminal (with a working directory of where you want the new project directory created), and execute the command.',
                    ],
                    [
                        'type' => 'image',
                        'src' => '/img/project-generation-screenshot.png',
                        'alt' => 'LaraSurf Project Generation',
                        'class' => 'w-full'
                    ],
                    [
                        'type' => 'heading-1',
                        'text' => 'Bash Alias',
                        'id' => 'project-generation-bash-alias',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'If this is your first time generating a project with LaraSurf, after the project generation completes the command <span class="inline-code">surf</span> should be aliased to <span class="inline-code">vendor/larasurf/larasurf/bin/surf.sh</span>.',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'You may use the following command to create this alias within your bash profile:',
                    ],
                    [
                        'type' => 'code',
                        'text' => '([[ -f ~/.bash_profile ]] && echo "alias surf=\'vendor/larasurf/larasurf/bin/surf.sh\'" >> ~/.bash_profile || (echo "source ~/.bashrc" >> ~/.bash_profile && echo "alias surf=\'vendor/larasurf/larasurf/bin/surf.sh\'" >> ~/.bash_profile)) && source ~/.bash_profile',
                    ],
                ],
            ],
            [
                'title' => 'AWS CLI Configuration',
                'id' => 'aws-cli-configuration',
                'content' => [
                    [
                        'type' => 'paragraph',
                        'html' => 'For LaraSurf projects, the AWS CLI does not need to be natively installed. Instead, a container image published by AWS is used.',
                    ],
                    [
                        'type' => 'callout',
                        'html' => 'If you have previously configured the AWS CLI on your machine with adequate credentials to create resources within your AWS account, there\'s nothing more you need to do for this step.',
                    ],
                    [
                        'type' => 'heading-1',
                        'text' => 'IAM User',
                        'id' => 'aws-cli-configuration-iam-user',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'If you do not already have access keys for the AWS account you\'d like to use for your project, that will be the first step. It is recommended to <strong>not</strong> use a root account for access and instead to create an IAM user within the AWS web console that has administrator access.',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'When creating an IAM user, be sure to enable programmatic access and save the Access Key ID and Secret Access Key from the downloadable CSV provided by AWS in a secure location; it will be needed in the next step.',
                    ],
                    [
                        'type' => 'heading-1',
                        'text' => 'CLI Configuration',
                        'id' => 'aws-cli-configuration-cli-configuration',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'Once you have the access keys needed you can configure the AWS CLI by running the following command (requires a bash alias, see the Project Generation documentation for more details):',
                    ],
                    [
                        'type' => 'code',
                        'text'=> 'surf aws configure',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'You will be prompted for the following pieces of information:',
                    ],
                    [
                        'type' => 'list',
                        'items' => [
                            'Your Access Key ID',
                            'Your Secret Access Key',
                            'The default region to use (when not otherwise specified)',
                            [
                                '<span class="inline-code">us-east-1</span> is recommended',
                            ],
                            'The default output format to use (when not otherwise specified)',
                            [
                                '<span class="inline-code">json</span> is recommended',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'GitHub Repository',
                'id' => 'github-repository',
                'content' => [
                    [
                        'type' => 'paragraph',
                        'html' => 'In order to run workflows on CircleCI (and to back up your code!), a GitHub repository for your project is required.',
                    ],
                    [
                        'type' => 'heading-1',
                        'text' => 'New Repository',
                        'id' => 'github-repository-new-repository',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'A new GitHub project can be created within your account or organization <a href="https://github.com/new" target="_blank">here</a>.',
                    ],
                    [
                        'type' => 'callout',
                        'html' => 'By convention, the name of your GitHub repository should match the name of your LaraSurf project specified during project generation (lowercase alphanumeric and hyphens).<br/>If you are unsure of your project name you can run <span class="inline-code">surf config get project-name</span> to get the configured value.'
                    ],
                    [
                        'type' => 'image',
                        'src' => '/img/new-repository.png',
                        'alt' => 'New GitHub Repository',
                        'class' => 'w-full'
                    ],
                    [
                        'type' => 'heading-1',
                        'text' => 'Local Git Configuration',
                        'id' => 'github-repository-local-git-configuration',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'After you\'ve created a repository on GitHub for your project, it is time to configure your local environment to reference GitHub as the remote repository.',
                    ],
                    [
                        'type' => 'callout',
                        'html' => 'The below examples are for a project called <span class="inline-code">my-project</span> within an organization named <span class="inline-code">my-org</span>. Replace this project name and organization name with the name of your own project and organization/account.',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'First, configure your local git repository to use your new GitHub repository as the remote repository.',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'git remote add origin git@github.com:my-org/my-project.git',
                    ],
                    [
                        'type' => 'heading-1',
                        'text' => 'The Default Branch',
                        'id' => 'github-repository-the-default-branch',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'Now, push up the <span class="inline-code">develop</span> branch and set it as the upstream branch.',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'git push -u origin develop',
                    ],
                    [
                        'type' => 'callout',
                        'html' => 'Note that the command above instructs you to push up the <span class="inline-code">develop</span> branch first (not the <span class="inline-code">main</span> branch), which will make GitHub treat the <span class="inline-code">develop</span> branch as the default branch for new pull requests.',
                    ],
                ],
            ],
            [
                'title' => 'CircleCI Configuration',
                'id' => 'circleci-configuration',
                'content' => [
                    [
                        'type' => 'paragraph',
                        'html' => 'In order for LaraSurf to be able to manage CircleCI environment variables on your behalf, a personal API token needs to be created within the CircleCI web console and configured within your local project.',
                    ],
                    [
                        'type' => 'callout',
                        'html' => 'Ensure you are signed into your CircleCI account before proceeding with the steps below.',
                    ],
                    [
                        'type' => 'heading-1',
                        'text' => 'Personal API Token',
                        'id' => 'circleci-configuration-personal-api-token',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'A personal API token for CircleCI first needs to be created and then configured for your LaraSurf project.',
                    ],
                    [
                        'type' => 'heading-2',
                        'text' => 'Creating the Personal API Token',
                        'id' => 'circleci-configuration-creating-the-personal-api-token',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'To create a personal API token, first navigate to the Personal API Tokens page within the user settings of your CircleCI account.',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'Click the <span class="inline-code">Create New Token</span> button, enter a name for your token (such as "LaraSurf - My Project"), and click <span class="inline-code">Add API Token</span>.',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'Your new API token will be displayed <strong>only once</strong>, so be sure to copy the token carefully.',
                    ],
                    [
                        'type' => 'heading-2',
                        'text' => 'Configuring the Token for your Project',
                        'id' => 'circleci-configuration-configuring-the-token-for-your-project',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'After you have created the CircleCI personal API token, you can configure it within your LaraSurf project with the following command:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf circleci set-api-key',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'You will be prompted to enter your personal API token.',
                    ],
                    [
                        'type' => 'callout',
                        'html' => 'Note that the prompt for entering your personal API token will not display what you type.',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'The API token you enter will be saved in your project at <span class="inline-code">.circleci/api-key.txt</span> which <strong>should not be checked into source control</strong>. Your <span class="inline-code">.gitignore</span> file should already be set up to ignore this file, but a sanity check to confirm never hurts.',
                    ],
                    [
                        'type' => 'heading-1',
                        'text' => 'Project Setup',
                        'id' => 'circleci-configuration-project-setup',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'Once your personal API token has been configured, you are ready to start building.',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'Again in the CircleCI web console, navigate to the <a href="https://app.circleci.com/projects/" target="_blank">Projects</a> page for your organization.',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'Next to the name of your LaraSurf project, click <span class="inline-code">Set Up Project</span>.',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'Choose the second option indicating your CircleCI configuration is ready and type in <span class="inline-code">develop</span> as the selected branch to start building for.',
                    ],
                    [
                        'type' => 'image',
                        'src' => '/img/circleci-project-setup.png',
                        'alt' => 'CircleCI Project Setup',
                        'class' => 'w-full lg:w-3/5'
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'Finally, click <span class="inline-code">Let\'s Go</span> to enable the CircleCI pipeline for your project. This will trigger running through the pipeline for the first time.',
                    ],
                ],
            ],
            [
                'title' => 'CircleCI Pipeline',
                'id' => 'circleci-pipeline',
                'content' => [
                    [
                        'type' => 'paragraph',
                        'html' => 'The preconfigured CircleCI configuration for a LaraSurf project defines a pipeline responsible for:',
                    ],
                    [
                        'type' => 'list',
                        'items' => [
                            'Building a container image for your application',
                            'Building a container image for your webserver (on applicable branches)',
                            'Checking PHP code style (if enabled)',
                            'Running unit and feature tests',
                            'Publishing container images to AWS ECR (on applicable branches)',
                            'Scanning container images for known vulnerabilities (on applicable branches)',
                            'Deploying container images to your AWS infrastructure (on applicable branches)',
                            'Running migrations post-deployment on your AWS RDS instance (on applicable branches)',
                        ],
                    ],
                    [
                        'type' => 'callout',
                        'html' => 'You are of course free to customize the published CircleCI configuration file to suit your project\'s needs.',
                    ],
                    [
                        'type' => 'heading-1',
                        'text' => 'All Branches',
                        'id' => 'circleci-pipeline-all-branches',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'For every branch, the defined pipeline will perform the following steps:',
                    ],

                    [
                        'type' => 'list',
                        'items' => [
                            'Checkout the applicable git commit',
                            'Build a container image for the application',
                            [
                                'Install system packages and PHP extensions',
                                'Install Composer dependencies',
                                'Install Yarn dependencies',
                                'Transpile front end assets',
                            ],
                            'Start containers for the application and a MySQL database',
                            'Copy the <span class="inline-code">.env.example</span> file to <span class="inline-code">.env</span> within the application container',
                            'Generate an application key within the application container',
                            'Run code style checks within the application container (if enabled)',
                            'Migrate the test database local to CircleCI',
                            'Run PHPUnit',
                        ],
                    ],
                    [
                        'type' => 'heading-1',
                        'text' => 'Stage and Main Branches',
                        'id' => 'circleci-pipeline-stage-and-main-branches',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'For the <span class="inline-code">stage</span> and <span class="inline-code">main</span> branches, the defined pipeline will do all of the above as well as:',
                    ],

                    [
                        'type' => 'list',
                        'items' => [
                            'Check for required CircleCI environment variables',
                            'Build a container image for the webserver',
                            'Publish the application and webserver container images to AWS ECR',
                            'Scan the application and webserver container images for known vulnerabilities',
                            [
                                'This is for reporting only; a found vulnerability does not prevent a deployment',
                            ],
                            'Deploy the application and webserver container images to AWS ECS',
                            'Run database migrations for the new application version on AWS RDS using AWS ECS',
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Local Development',
                'id' => 'local-development',
                'content' => [
                    [
                        'type' => 'callout',
                        'html' => 'Before attempting to run any commands that use the LaraSurf CLI, ensure you have created a bash alias for <span class="inline-code">surf</span> as <a href="#project-generation-bash-alias">described here</a>.',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'The local development environment for LaraSurf projects is centered around local services available through Docker Compose.',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'These services include:',
                    ],
                    [
                        'type' => 'list',
                        'items' => [
                            'LocalStack for local AWS services',
                            [
                                'An S3 bucket',
                                'An SQS queue',
                            ],
                            'MailHog for a fake SMTP server',
                            'NGINX for the webserver',
                            'PHP-FPM for the Laravel application',
                            [
                                'PHP 8',
                            ],
                            'MySQL 8 for the database',
                            'Redis for the cache',
                        ],
                    ],
                    [
                        'type' => 'callout',
                        'html' => 'Should your project require additional local services or additional LocalStack services, you are free to modify the Docker Compose configuration as you see fit.',
                    ],
                    [
                        'type' => 'heading-1',
                        'text' => 'Local Environment',
                        'id' => 'local-development-local-environment',
                    ],
                    [
                        'type' => 'callout',
                        'html' => 'After the project generation process completes your environment will have already been started.',
                    ],
                    [
                        'type' => 'heading-2',
                        'text' => 'Starting the Local Environment',
                        'id' => 'local-development-local-environment-starting',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'You can start the local environment\'s service by running the following command:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf up',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'This is equivalent to running <span class="inline-code">docker-compose up -d</span>.',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'Additionally, if you\'d like to start your local environment and monitor output from the environment\'s services, you can start in attached mode by instead running:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf up --attach',
                    ],
                    [
                        'type' => 'heading-2',
                        'text' => 'Stopping the Local Environment',
                        'id' => 'local-development-local-environment-stopping',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'You can stop your local environment\'s services by running the following command:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf down',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => '<strong>This will destroy your local environment\'s database and cache.</strong>',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'If you would like to preserve the state of your database and cache, you can instead run the following command:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf down --preserve',
                    ],
                    [
                        'type' => 'heading-2',
                        'text' => 'Refreshing the Local Environment',
                        'id' => 'local-development-local-environment-refreshing',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'In the event you would like to refresh your local environment, including wiping the database and cache as well as running migrations, you can use the following command:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf fresh',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'In addition if you\'d also like to run the default database seeder, you can run:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf fresh --seed',
                    ],
                    [
                        'type' => 'heading-1',
                        'text' => 'Application Access',
                        'id' => 'local-development-application-access',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'If your project supports local TLS, your application can also be accessed at <a href="https://localhost" target="_blank">https://localhost</a>.',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'Otherwise, your application can also be accessed at <a href="http://localhost" target="_blank">http://localhost</a>.',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'If you specified custom ports for your application, append a colon followed by the port number to the URL in your web browser to access your application. For example <a href="https://localhost:8080" target="_blank">https://localhost:8080</a>',
                    ],
                    [
                        'type' => 'heading-2',
                        'text' => 'Email Outbox',
                        'id' => 'local-development-application-access-email-outbox',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'MailHog is used as a local fake SMTP server. Unless you specified custom ports for your project, the MailHog UI can be accessed at <a href="http://localhost:8025" target="_blank">http://localhost:8025</a>.',
                    ],
                    [
                        'type' => 'heading-1',
                        'text' => 'Composer Commands',
                        'id' => 'local-development-composer-commands',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'You may execute Composer commands using your local environment\'s application service with the following syntax:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf composer <command>',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'For example:'
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf composer --version'
                    ],
                    [
                        'type' => 'heading-1',
                        'text' => 'Yarn Commands',
                        'id' => 'local-development-yarn-commands',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'You may execute Yarn commands using your local environment\'s application service with the following syntax:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf yarn <command>',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'For example:'
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf yarn --version'
                    ],
                    [
                        'type' => 'callout',
                        'html' => 'To watch front end assets for changes during local development, use the command: <br/><span class="inline-code">surf yarn watch-poll</span>'
                    ],
                    [
                        'type' => 'heading-1',
                        'text' => 'NPX Commands',
                        'id' => 'local-development-npx-commands',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'You may execute NPX commands using your local environment\'s application service with the following syntax:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf npx <command>',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'For example:'
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf npx --version'
                    ],
                    [
                        'type' => 'heading-1',
                        'text' => 'Node Commands',
                        'id' => 'local-development-node-commands',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'You may execute Node commands using your local environment\'s application service with the following syntax:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf node <command>',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'For example:'
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf node --version'
                    ],
                    [
                        'type' => 'heading-1',
                        'text' => 'AWS CLI Commands',
                        'id' => 'local-development-aws-cli-commands',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'You may execute AWS CLI commands against your local environment\'s AWS service with the following syntax:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf awslocal <command>',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'For example:'
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf awslocal --version'
                    ],
                    [
                        'type' => 'heading-1',
                        'text' => 'Artisan Commands',
                        'id' => 'local-development-artisan-commands',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'You may execute Artisan commands using your local environment\'s application service with the following syntax:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf artisan <command>',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'For example:'
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf artisan tinker'
                    ],
                    [
                        'type' => 'heading-1',
                        'text' => 'Queue',
                        'id' => 'local-development-queue',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'With LocalStack having a functioning SQS implementation, the default queue connection for local development on LaraSurf projects is <span class="inline-code">sqs</span>.',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'This means whenever an interaction with your local application enqueues a job, it must be consumed by a worker by running the following command:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf artisan queue:work',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'The above command will keep the queue worker open until the process is exited with <span class="inline-code">Ctrl + C</span>.',
                    ],
                    [
                        'type' => 'heading-1',
                        'text' => 'PHPUnit',
                        'id' => 'local-development-phpunit',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'You may execute PHPUnit, with or without any additional options, using the following syntax:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf test <options>',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'For example:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf test',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf test --filter MyTest',
                    ],
                    [
                        'type' => 'heading-1',
                        'text' => 'IDE Helper / Code Style',
                        'id' => 'local-development-ide-helper-code-style',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'You may generate updated IDE Helper files as well as fix the code style to match your configured preferences with the following command:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf fix',
                    ],
                    [
                        'type' => 'heading-1',
                        'text' => 'New TLS Certificate',
                        'id' => 'local-development-new-tls-certificate',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'If your local environment\'s TLS certificate has expired, you can generate a new one, rebuild your webserver container image, and restart your local environment\'s services with the following sequence of commands:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf tls',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf rebuild webserver',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf fresh',
                    ],
                    [
                        'type' => 'heading-1',
                        'text' => 'LaraSurf Configuration',
                        'id' => 'local-development-larasurf-configuration',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'You may manage values in your project\'s larasurf.json file, which <strong>should not be manually edited</strong>, using the <span class="inline-code">config</span> command.',
                    ],
                    [
                        'type' => 'heading-2',
                        'text' => 'Getting a Configuration Value',
                        'id' => 'local-development-larasurf-configuration-get-value',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'A configuration value can be retrieved with the following syntax:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf config get <key>',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'For example:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf config get aws-profile',
                    ],
                    [
                        'type' => 'heading-2',
                        'text' => 'Setting a Configuration Value',
                        'id' => 'local-development-larasurf-configuration-set-value',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'A configuration value can be updated with the following syntax:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf config set <key> <value>',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'For example:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf config set aws-profile profile-name',
                    ],
                    [
                        'type' => 'heading-1',
                        'text' => 'WSL2 Users',
                        'id' => 'local-development-wsl2-users',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'There is an <a href="https://github.com/docker/compose/issues/7899" target="_blank">open issue</a> with WSL2 where sometimes the current working directory cannot be accessed.',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'You can identify this situation if you ever see the following errors when running a <span class="inline-code">git</span>, <span class="inline-code">docker-compose</span>, or <span class="inline-code">surf</span> command:',
                    ],
                    [
                        'type' => 'code',
                        'show-copy-button' => false,
                        'text' => 'fatal: Unable to read current working directory: No such file or directory',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'or',
                    ],
                    [
                        'type' => 'code',
                        'show-copy-button' => false,
                        'text' => 'Traceback (most recent call last):
  File "docker-compose", line 3, in <module>
  File "compose/cli/main.py", line 81, in main
  File "compose/cli/main.py", line 200, in perform_command
  File "compose/cli/command.py", line 70, in project_from_options
  File "compose/cli/command.py", line 144, in get_project
  File "compose/config/config.py", line 317, in find
  File "compose/config/config.py", line 353, in get_default_config_files
  File "compose/config/config.py", line 389, in find_candidates_in_parent_dirs
  File "posixpath.py", line 383, in abspath
FileNotFoundError: [Errno 2] No such file or directory
[13669] Failed to execute script docker-compose',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'A workaround for when this issue pops up is to run <span class="inline-code">cd $(pwd)</span>.',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'This can be simplified by adding the following alias to your Bash profile:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'alias wtf=\'cd $(pwd)\'',
                    ],
                ],
            ],
            [
                'title' => 'Cloud Environments',
                'id' => 'cloud-environments',
                'content' => [
                    [
                        'type' => 'paragraph',
                        'html' => 'The LaraSurf CLI provides commands to complete various tasks in cloud environments (AWS).',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'All commands prefixed with <span class="inline-code">cloud-</span> interact with AWS services.',
                    ],
                    [
                        'type' => 'heading-1',
                        'text' => 'Domains',
                        'id' => 'cloud-environments-domains',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'Before a project can be deployed to Stage or Production, a Hosted Zone for the domain must exist in AWS.',
                    ],
                    [
                        'type' => 'callout',
                        'html' => 'If you have purchased a domain through the AWS web console, a Hosted Zone for the domain has already been created and there\'s nothing more you need to do.',
                    ],
                    [
                        'type' => 'heading-2',
                        'text' => 'Checking if a Hosted Zone Exists',
                        'id' => 'cloud-environments-domains-hosted-zone-exists',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'You can determine if a Hosted Zone exists for a specified domain using the following command syntax:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-domains hosted-zone-exists --domain <domain>',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'For example:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-domains hosted-zone-exists --domain example.com',
                    ],
                    [
                        'type' => 'heading-2',
                        'text' => 'Creating a Hosted Zone',
                        'id' => 'cloud-environments-domains-create-hosted-zone',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'You can create a Hosted Zone for a domain using the following command syntax:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-domains create-hosted-zone --domain <domain>',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'For example:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-domains create-hosted-zone --domain example.com',
                    ],
                    [
                        'type' => 'callout',
                        'html' => 'The only reason you would need to create a Hosted Zone on AWS yourself is if you purchased your domain elsewhere. If so, you will need to both create the Hosted Zone and point your domain at the supplied nameservers within your domain registrar (see command below).',
                    ],
                    [
                        'type' => 'heading-2',
                        'text' => 'Listing Nameservers for a Hosted Zone',
                        'id' => 'cloud-environments-domains-nameservers',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'You can list the nameservers for a Hosted Zone using the following command syntax:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-domains nameservers --domain <domain>',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'For example:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-domains nameservers --domain example.com',
                    ],
                    [
                        'type' => 'heading-1',
                        'text' => 'Users',
                        'id' => 'cloud-environments-users',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'In order for CircleCI to change AWS resources on your behalf, an IAM User for CircleCI to use must exist.',
                    ],
                    [
                        'type' => 'heading-2',
                        'text' => 'Creating Users',
                        'id' => 'cloud-environments-users-create-user',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'Creating a cloud user for CircleCI can be done with the following command:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-users create --user circleci',
                    ],
                    [
                        'type' => 'callout',
                        'html' => 'The above command creates an IAM User with administrator access for simplicity. <br/>It is recommended to modify this IAM User\'s attached policies to only include the bare minimum permissions needed to change your infrastructure.',
                    ],
                    [
                        'type' => 'heading-2',
                        'text' => 'Deleting Users',
                        'id' => 'cloud-environments-users-delete-user',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'Deleting a cloud user for CircleCI can be done with the following command:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-users delete --user circleci',
                    ],
                    [
                        'type' => 'heading-1',
                        'text' => 'Images',
                        'id' => 'cloud-environments-images',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'Before CircleCI can publish container images to AWS ECR as part of the defined pipeline, image repositories for the environment must first be created.',
                    ],
                    [
                        'type' => 'heading-2',
                        'text' => 'Creating Image Repositories',
                        'id' => 'cloud-environments-images-creating-repositories',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'To create image repositories for the specified environment, use the following syntax:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-images create-repos --environment <environment>',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'For example:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-images create-repos --environment stage',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-images create-repos --environment production',
                    ],
                    [
                        'type' => 'callout',
                        'html' => 'You must be on the <span class="inline-code">develop</span> branch to create image repositories. <br/>After the repositories are created for the specified environment, you should commit the changes that have been made to your local <span class="inline-code">larasurf.json</span> file (and push to GitHub). <br/>If you do not wish to wait for CircleCI to run the defined pipeline for your commit to <span class="inline-code">develop</span>, you can prepend your commit message with <span class="inline-code">[skip ci]</span>.',
                    ],
                    [
                        'type' => 'heading-2',
                        'text' => 'Deleting Image Repositories',
                        'id' => 'cloud-environments-images-deleting-repositories',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'To delete image repositories for the specified environment use the following command syntax:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-images delete-repos --environment <environment>',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'For example:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-images delete-repos --environment stage',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-images delete-repos --environment production',
                    ],
                    [
                        'type' => 'callout',
                        'html' => 'If the infrastructure stack for an environment exists, that must first be deleted before image repositories can be deleted.',
                    ],
                    [
                        'type' => 'heading-2',
                        'text' => 'Building Images',
                        'id' => 'cloud-environments-images-building',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'Container images for both the application and webserver of a LaraSurf project are built automatically via the defined CircleCI pipeline. All that\'s needed is a commit to the <span class="inline-code">stage</span> or <span class="inline-code">main</span> branch.',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'Following the <a href="#project-lifecycle-local-development-branching-pattern">branching pattern described here</a>, after creating image repositories the next step is to merge <span class="inline-code">develop</span> into <span class="inline-code">stage</span> (and possibly <span class="inline-code">stage</span> into <span class="inline-code">main</span>) to trigger CircleCI.',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'For example, if you\'ve just created image repositories for the Stage environment <strong>and you\'ve committed the <span class="inline-code">larasurf.json</span> changes to <span class="inline-code">develop</span></strong>, the following sequence of commands cloud be executed to merge <span class="inline-code">develop</span> into <span class="inline-code">stage</span> and create the <span class="inline-code">stage</span> branch on GitHub.',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'git checkout stage',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'git merge develop',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'git push -u origin stage',
                    ],
                    [
                        'type' => 'heading-1',
                        'text' => 'Infrastructure Stacks',
                        'id' => 'cloud-environments-infrastructure-stacks',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'An infrastructure stack (CloudFormation stack) is a collection of resources grouped together and created or updated using a template.',
                    ],
                    [
                        'type' => 'heading-2',
                        'text' => 'Creating Stacks',
                        'id' => 'cloud-environments-infrastructure-stacks-creating-stacks',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'If you have just triggered CircleCI to build images for an environment\'s branch (<span class="inline-code">stage</span> or <span class="inline-code">main</span>), the next step is to create the infrastructure stack for the same environment.',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'This can be done using the following command syntax:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-stacks create --environment <environment>',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'For example:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-stacks create --environment stage',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-stacks create --environment production',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'This command will prompt you for various inputs to gather desired configuration for your environment.',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'These inputs include:',
                    ],
                    [
                        'type' => 'list',
                        'items' => [
                            'The database instance type',
                            'The database storage to allocate (GB)',
                            'The cache node type',
                            'The CPU for the task definition',
                            'The memory for the task definition',
                            'The target CPU value for autoscaling',
                            'The scale-out cooldown period (seconds)',
                            'The scale-in cooldown period (seconds)',
                            'The fully qualified domain name for the environment',
                            'The ACM certificate ARN to use, if it already exists',
                            [
                                'If an ACM certificate for your fully qualified domain is not specified, one will be created and verified on your behalf'
                            ],
                        ],
                    ],
                    [
                        'type' => 'callout',
                        'html' => 'Please be prepared to wait up to 60 minutes for your infrastructure stack to finish creating. <br/>LaraSurf will need to first create the stack, then create cloud variables (Parameter Store secrets) for your application, then update the recently created stack with these variables.',
                    ],
                    [
                        'type' => 'heading-2',
                        'text' => 'Updating Stacks',
                        'id' => 'cloud-environments-infrastructure-stacks-updating-stacks',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'If you have created new cloud variables (more on this below), have modified your project\'s CloudFormation template, or want to change one of the configuration options entered during stack creation, you can use the following command syntax:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-stacks update --environment <environment>',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'For example:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-stacks update --environment stage',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-stacks update --environment production',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'This command will prompt you for which configuration(s) you\'d like to change, or you can select none of them to simply update the stack with the most recent cloud variables and infrastructure template (specific to your local working copy of the code).',
                    ],
                    [
                        'type' => 'callout',
                        'html' => 'It is recommended to make infrastructure changes using the above command instead of letting CircleCI do it as part of the pipeline for the stage or production branch. <br/>The CircleCI configuration timeout is limited to 30 minutes.',
                    ],
                    [
                        'type' => 'heading-2',
                        'text' => 'Deleting Stacks',
                        'id' => 'cloud-environments-infrastructure-stacks-deleting-stacks',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'The first step of tearing down an evironment is deleting the previously created stack.',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'This can be done using the following command command syntax:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-stacks delete --environment <environment>',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'For example:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-stacks delete --environment stage',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-stacks delete --environment production',
                    ],
                    [
                        'type' => 'heading-1',
                        'text' => 'Environment Variables',
                        'id' => 'cloud-environments-environment-variables',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'Environment variables for your application in cloud environments are stored in AWS SSM Parameter Store as secure strings.',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'As part of the deployment process, LaraSurf will gather all environment variables from Parameter Store and set them to be loaded as environment variables within the application container.',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'This means that if environment variables are changed, the container must be updated before changes will be reflected in the environment (which can be done with the <span class="inline-code">cloud-stacks update</span> command).',
                    ],
                    [
                        'type' => 'heading-2',
                        'text' => 'Listing Environment Variables',
                        'id' => 'cloud-environments-environment-variables-list',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'Environment variables defined for the Stage or Production environment can be listed using the following command syntax:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-vars list --environment <environment>',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'For example:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-vars list --environment stage',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-vars list --environment production',
                    ],
                    [
                        'type' => 'heading-2',
                        'text' => 'Listing with Values',
                        'id' => 'cloud-environments-environment-variables-list-values',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'By default, the <span class="inline-code">cloud-vars list</span> command will not display the values of each variable.',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'To do so, you may add the <span class="inline-code">--values</span> option to the above command like so:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-vars list --values --environment <environment>',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'For example:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-vars list --values --environment stage',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-vars list --values --environment production',
                    ],
                    [
                        'type' => 'heading-2',
                        'text' => 'Getting an Environment Variable',
                        'id' => 'cloud-environments-environment-variables-get',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'To get the value of an individual environment variable, the following command syntax can be used:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-vars get --environment <environment> --key <key>',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'For example:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-vars get --environment stage --key APP_KEY',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-vars get --environment production --key APP_KEY',
                    ],
                    [
                        'type' => 'heading-2',
                        'text' => 'Setting an Environment Variable',
                        'id' => 'cloud-environments-environment-variables-set',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'To set the value of an environment variable (new or overwrite existing), the following command syntax can be used:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-vars put --environment <environment> --key <key> --value <value>',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'For example:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-vars set --environment stage --key SOME_API_KEY --value a1b2c3d4',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-vars set --environment production --key SOME_API_KEY --value a1b2c3d4',
                    ],
                    [
                        'type' => 'heading-2',
                        'text' => 'Deleting an Environment Variable',
                        'id' => 'cloud-environments-environment-variables-delete',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'To delete an environment variable, the following command syntax can be used:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-vars delete --environment <environment> --key <key>',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'For example:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-vars delete --environment stage --key SOME_API_KEY',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-vars delete --environment production --key SOME_API_KEY',
                    ],
                    [
                        'type' => 'heading-1',
                        'text' => 'Ingress',
                        'id' => 'cloud-environments-ingress',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'Ingress to both the application and the database can be managed using the <span class="inline-code">cloud-ingress</span> command.',
                    ],
                    [
                        'type' => 'callout',
                        'html' => 'Ingress to the application means the specified source can interact with the application over HTTPS. <br/>Ingress to the database means the specified source can connect to the database, but only if the correct credentials are given.',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'The <span class="inline-code">--type</span> given to the <span class="inline-code">cloud-ingress</span> command can be <span class="inline-code">application</span> or <span class="inline-code">database</span>.',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'The <span class="inline-code">--source</span> given to the <span class="inline-code">cloud-ingress</span> command can be <span class="inline-code">me</span> (for your IP address), <span class="inline-code">public</span> (for any IP address) or an IPv4 address.',
                    ],
                    [
                        'type' => 'heading-2',
                        'text' => 'Allowing Ingress for a Source',
                        'id' => 'cloud-environments-ingress-allow',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'To allow ingress for a source into either the application or the database, the following command syntax can be used:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-ingress allow --environment <environment> --type <type> --source <source>',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'For example:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-ingress allow --environment stage --type application --source me',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-ingress allow --environment stage --type application --source public',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-ingress allow --environment stage --type application --source 1.2.3.4',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-ingress allow --environment stage --type database --source me',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-ingress allow --environment stage --type database --source 1.2.3.4',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-ingress allow --environment production --type application --source me',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-ingress allow --environment production --type application --source public',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-ingress allow --environment production --type application --source 1.2.3.4',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-ingress allow --environment production --type database --source me',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-ingress allow --environment production --type database --source 1.2.3.4',
                    ],
                    [
                        'type' => 'callout',
                        'html' => 'If at least one ingress rule allows access for a source, ingress will be allowed. <br/>A common pattern is to allow ingress into the application from only your IP address, ensure things are working as expected, then allow public ingress into the application, and then revoke ingress from your IP address (ingress from your IP address will still be allowed because of the <span class="inline-code">public</span> rule).',
                    ],
                    [
                        'type' => 'heading-2',
                        'text' => 'Revoking Ingress for a Source',
                        'id' => 'cloud-environments-ingress-revoke',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'To revoke ingress for a source into either the application or database, the following command syntax can be used:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-ingress revoke --environment <environment> --type <type> --source <source>',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'For example:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-ingress revoke --environment stage --type application --source me',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-ingress revoke --environment stage --type application --source public',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-ingress revoke --environment stage --type application --source 1.2.3.4',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-ingress revoke --environment stage --type database --source me',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-ingress revoke --environment stage --type database --source 1.2.3.4',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-ingress revoke --environment production --type application --source me',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-ingress revoke --environment production --type application --source public',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-ingress revoke --environment production --type application --source 1.2.3.4',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-ingress revoke --environment production --type database --source me',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-ingress revoke --environment production --type database --source 1.2.3.4',
                    ],
                    [
                        'type' => 'heading-2',
                        'text' => 'Listing Ingress Rules',
                        'id' => 'cloud-environments-ingress-list',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'To check which sources are currently allowed ingress into either the application or database, the following command syntax can be used:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-ingress list --environment <environment> --type <type>',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'For example:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-ingress list --environment stage --type application',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-ingress list --environment stage --type database',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-ingress list --environment production --type application',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-ingress list --environment production --type database',
                    ],
                    [
                        'type' => 'heading-1',
                        'text' => 'Email Sending',
                        'id' => 'cloud-environments-email-sending',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'If your application send emails, LaraSurf assumes you will be using a fake SMTP server like MailTrap for the Stage environment and will be sending live emails from the Production environment.',
                    ],
                    [
                        'type' => 'callout',
                        'html' => 'By default LaraSurf sets the <span class="inline-code">MAIL_MAILER</span> variable to <span class="inline-code">smtp</span> for Stage and <span class="inline-code">ses</span> for Production.',
                    ],
                    [
                        'type' => 'heading-2',
                        'text' => 'SMTP',
                        'id' => 'cloud-environments-email-sending-smtp',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'To configure SMTP sending for your application on either environment, simply use the <span class="inline-code">cloud-vars</span> command to set the appropriate environment variables.',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'For example:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-vars put --environment stage --key MAIL_MAILER --value smtp',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-vars put --enviornment stage --key MAIL_HOST --value smtp.mailtrap.io',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-vars put --environment stage --key MAIL_PORT --value 2525',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-vars put --environment stage --key MAIL_USERNAME --value a1b2c3d4e5',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-vars put --enviornment stage --key MAIL_PASSWORD --value 9z8y7x6w5v',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-vars put --environment stage --key MAIL_ENCRYPTION --value tls',
                    ],
                    [
                        'type' => 'heading-2',
                        'text' => 'AWS SES',
                        'id' => 'cloud-environments-email-sending-aws-ses',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'To configure SES ending for your application on either environment, you can use the <span class="inline-code">cloud-vars</span> command to set the appropriate environment variable.',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'For example:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-vars put --environment production --key MAIL_MAILER --value ses',
                    ],
                    [
                        'type' => 'heading-2',
                        'text' => 'SES Domain Verification',
                        'id' => 'cloud-environments-email-sending-aws-ses-domain-verification',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'To verify your environment\'s domain for both SPF and DKIM, use the following command syntax:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-emails verify-domain --environment <environment>',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'For example:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-emails verify-domain --environment stage',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-emails verify-domain --environment production',
                    ],
                    [
                        'type' => 'callout',
                        'html' => 'The <span class="inline-code">verify-domain</span> subcommand must be done after the stack has been created for an environment.',
                    ],
                    [
                        'type' => 'heading-2',
                        'text' => 'SES Enabling Live Emails',
                        'id' => 'cloud-environments-email-sending-aws-ses-enabling-live-emails',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'By default, AWS account have SES in sandbox mode to reduce spam. To request that your account be taken out of sandbox mode and allow for live emails to be sent, use the following command and follow the prompts:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-emails enable-sending',
                    ],
                    [
                        'type' => 'callout',
                        'html' => 'Please allow up to 24 hours for AWS to respond to your request.',
                    ],
                    [
                        'type' => 'heading-1',
                        'text' => 'File Storage',
                        'id' => 'cloud-environments-file-storage',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'Part of the infrastructure stack is an S3 bucket for file storage. Using S3 should almost always be preferred for any dynamically created file because each container within the ECS cluster will have a separate local filesystem.',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'As part of the <span class="inline-code">cloud-stacks create</span> command, your application will be configured to use the created S3 bucket.',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'To upload files directly to S3 from the client side, use pre-signed URLs and an <a href="https://stackoverflow.com/a/40311906/6472849" target="_blank">XMLHttpRequest</a>.',
                    ],
                    [
                        'type' => 'heading-1',
                        'text' => 'Queue',
                        'id' => 'cloud-environments-queue',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'Part of the infrastructure stack is an SQS queue for queued jobs.',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'As part of the <span class="inline-code">cloud-stacks create</span> command, your application will be configured to use created SQS queue.',
                    ],
                    [
                        'type' => 'heading-1',
                        'text' => 'Scheduled Commands',
                        'id' => 'cloud-environments-scheduled-commands',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'Part of the infrastructure stack is a CloudWatch Events rule that runs an ECS task responsible for invoking artisan to check for scheduled commands. This occurs <strong>every five minutes</strong>.',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'There\'s nothing additional you need to do to configure your application to support scheduled commands.',
                    ],
                    [
                        'type' => 'heading-1',
                        'text' => 'Artisan Commands',
                        'id' => 'cloud-environments-artisan-commands',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'Artisan commands can be run on demand on a specific cloud environment using the following command syntax:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-artisan "artisan command" --environment <environment>',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'For example:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-artisan "migrate:fresh --seed" --environment stage',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-artisan "db:seed --class MySeeder" --environment production',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'After the artisan command finishes the output of the command will be displayed in your terminal.',
                    ],
                    [
                        'type' => 'heading-2',
                        'text' => 'Tinker',
                        'id' => 'cloud-environments-artisan-commands-tinker',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'Creating a Tinker session for a specific cloud environment is also supported using the following command syntax:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-artisan tinker --environment <environment>',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'For example:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-artisan tinker --environment stage',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-artisan tinker --environment production',
                    ],
                    [
                        'type' => 'callout',
                        'html' => 'Please be patient when running any artisan command on a cloud environment as it can take some time due to the need to run a new task on ECS.',
                    ],
                    [
                        'type' => 'heading-1',
                        'text' => 'AWS CLI',
                        'id' => 'cloud-environments-aws-cli',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'Direct interaction with cloud infrastructure is supported without needing to natively install the AWS CLI.',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'AWS CLI v2 commands can be executed using the following command syntax:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf aws <command>',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'For example:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf aws s3 ls',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf aws s3 ls s3 s3://my-bucket',
                    ],
                    [
                        'type' => 'heading-1',
                        'text' => 'Health Checks',
                        'id' => 'cloud-environments-health-checks',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'As part of project generation, LaraSurf has automatically added the route <span class="inline-code">/api/healthcheck</span> which returns a <span class="inline-code">200</span>.',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'This is used for the Load Balancer\'s Target Group.',
                    ],
                ],
            ],
            [
                'title' => 'LaraSurf CLI Reference',
                'id' => 'larasurf-cli-reference',
                'content' => [
                    [
                        'type' => 'heading-1',
                        'text' => 'CircleCI',
                        'id' => 'larasurf-cli-reference-circleci',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'Command signature:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf circleci <subcommand>',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'Arguments:',
                    ],
                    [
                        'type' => 'list',
                        'items' => [
                            '<span class="inline-code">subcommand</span>: the subcommand to run',
                            [
                                '<span class="inline-code">set-api-key</span>: set the CircleCI API token',
                                '<span class="inline-code">clear-api-key</span>: clear the stored CircleCI API token',
                            ],
                        ],
                    ],
                    [
                        'type' => 'heading-1',
                        'text' => 'Cloud Artisan',
                        'id' => 'larasurf-cli-reference-cloud-artisan',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'Command signature:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-artisan "<command>" --environment <environment>',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'Arguments:',
                    ],
                    [
                        'type' => 'list',
                        'items' => [
                            '<span class="inline-code">command</span>: the command to run, in quotes',
                        ],
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'Options:',
                    ],
                    [
                        'type' => 'list',
                        'items' => [
                            '<span class="inline-code">environment</span>: the cloud environment',
                            [
                                '<span class="inline-code">stage</span>',
                                '<span class="inline-code">production</span>',
                            ]
                        ],
                    ],
                    [
                        'type' => 'heading-1',
                        'text' => 'Cloud Domains',
                        'id' => 'larasurf-cli-reference-cloud-domains',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'Command signature:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-domains <subcommand> --domain <domain>',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'Arguments:',
                    ],
                    [
                        'type' => 'list',
                        'items' => [
                            '<span class="inline-code">subcommand</span>: the subcommand to run',
                            [
                                '<span class="inline-code">hosted-zone-exists</span>: check if a Hosted Zone exists for the domain',
                                '<span class="inline-code">create-hosted-zone</span>: create a Hosted Zone for the domain',
                                '<span class="inline-code">nameservers</span>: get the nameservers for a Hosted Zone by domain',
                            ],
                        ],
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'Options:',
                    ],
                    [
                        'type' => 'list',
                        'items' => [
                            '<span class="inline-code">domain</span>: the domain name',
                        ],
                    ],
                    [
                        'type' => 'heading-1',
                        'text' => 'Cloud Emails',
                        'id' => 'larasurf-cli-reference-cloud-emails',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'Command signature:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-emails <subcommand> --environment <environment>',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'Arguments:',
                    ],
                    [
                        'type' => 'list',
                        'items' => [
                            '<span class="inline-code">subcommand</span>: the subcommand to run',
                            [
                                '<span class="inline-code">verify-domain</span>: verify the environment\'s domain name for email sending, both SPF and DKIM',
                                '<span class="inline-code">check-verification</span>: check SPF and DKIM verification for the environment\'s domain name',
                                '<span class="inline-code">enable-sending</span>: request to get out of the AWS SES sandbox',
                                [
                                    'does not require the <span class="inline-code">environment</span> option'
                                ],
                                '<span class="inline-code">check-sending</span>: check if live email sending is enabled (not in sandbox)',
                                [
                                    'does not require the <span class="inline-code">environment</span> option'
                                ],
                            ],
                        ],
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'Options:',
                    ],
                    [
                        'type' => 'list',
                        'items' => [
                            '<span class="inline-code">environment</span>: the cloud environment',
                            [
                                '<span class="inline-code">stage</span>',
                                '<span class="inline-code">production</span>',
                            ]
                        ],
                    ],
                    [
                        'type' => 'heading-1',
                        'text' => 'Cloud Images',
                        'id' => 'larasurf-cli-reference-cloud-images',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'Command signature:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-images <subcommand> --environment <environment>',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'Arguments:',
                    ],
                    [
                        'type' => 'list',
                        'items' => [
                            '<span class="inline-code">subcommand</span>: the subcommand to run',
                            [
                                '<span class="inline-code">create-repos</span>: create container image repositories on AWS ECR for the specified environment',
                                '<span class="inline-code">delete-repos</span>: delete container image repositories on AWS ECR for the specified environment',
                            ],
                        ],
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'Options:',
                    ],
                    [
                        'type' => 'list',
                        'items' => [
                            '<span class="inline-code">environment</span>: the cloud environment',
                            [
                                '<span class="inline-code">stage</span>',
                                '<span class="inline-code">production</span>',
                            ]
                        ],
                    ],
                    [
                        'type' => 'heading-1',
                        'text' => 'Cloud Ingress',
                        'id' => 'larasurf-cli-reference-cloud-ingress',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'Command signature:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-ingress <subcommand> --environment <environment> --type <type> --source <source>',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'Arguments:',
                    ],
                    [
                        'type' => 'list',
                        'items' => [
                            '<span class="inline-code">subcommand</span>: the subcommand to run',
                            [
                                '<span class="inline-code">allow</span>: allow ingress of the specified type from the specified source for the specified environment',
                                '<span class="inline-code">revoke</span>: revoke ingress of the specified type from the specified source for the specified environment',
                                '<span class="inline-code">list</span>: list ingress rules of the specified type for the specified environment',
                                [
                                    'does not require the <span class="inline-code">type</span> or <span class="inline-code">source</span> options'
                                ],
                            ],
                        ],
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'Options:',
                    ],
                    [
                        'type' => 'list',
                        'items' => [
                            '<span class="inline-code">environment</span>: the cloud environment',
                            [
                                '<span class="inline-code">stage</span>',
                                '<span class="inline-code">production</span>',
                            ],
                            '<span class="inline-code">type</span>: the ingress type',
                            [
                                '<span class="inline-code">application</span>',
                                '<span class="inline-code">database</span>',
                            ],
                            '<span class="inline-code">source</span>: the ingress source',
                            [
                                '<span class="inline-code">me</span>',
                                '<span class="inline-code">public</span>',
                                'any IPv4 address',
                            ],
                        ],
                    ],
                    [
                        'type' => 'heading-1',
                        'text' => 'Cloud Stacks',
                        'id' => 'larasurf-cli-reference-cloud-stacks',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'Command signature:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-stacks <subcommand> --environment <environment> --key <key>',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'Arguments:',
                    ],
                    [
                        'type' => 'list',
                        'items' => [
                            '<span class="inline-code">subcommand</span>: the subcommand to run',
                            [
                                '<span class="inline-code">status</span>: get the status of the stack for the specified environment',
                                [
                                    'does not require the <span class="inline-code">key</span> option'
                                ],
                                '<span class="inline-code">create</span>: create the stack for the specified environment',
                                [
                                    'does not require the <span class="inline-code">key</span> option'
                                ],
                                '<span class="inline-code">update</span>: update the stack for the specified environment',
                                [
                                    'does not require the <span class="inline-code">key</span> option'
                                ],
                                '<span class="inline-code">delete</span>: delete the stack for the specified environment',
                                [
                                    'does not require the <span class="inline-code">key</span> option'
                                ],
                                '<span class="inline-code">wait</span>: wait for the current stack changes for the specified environment',
                                [
                                    'does not require the <span class="inline-code">key</span> option'
                                ],
                                '<span class="inline-code">output</span>: get the specified stack output for the specified environment',
                            ],
                        ],
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'Options:',
                    ],
                    [
                        'type' => 'list',
                        'items' => [
                            '<span class="inline-code">environment</span>: the cloud environment',
                            [
                                '<span class="inline-code">stage</span>',
                                '<span class="inline-code">production</span>',
                            ],
                            '<span class="inline-code">key</span>: the stack output key',
                        ],
                    ],
                    [
                        'type' => 'heading-1',
                        'text' => 'Cloud Users',
                        'id' => 'larasurf-cli-reference-cloud-users',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'Command signature:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-users <subcommand> --user <user>',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'Arguments:',
                    ],
                    [
                        'type' => 'list',
                        'items' => [
                            '<span class="inline-code">subcommand</span>: the subcommand to run',
                            [
                                '<span class="inline-code">create</span>: create the specified cloud user',
                                '<span class="inline-code">delete</span>: delete the specified cloud user',
                            ],
                        ],
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'Options:',
                    ],
                    [
                        'type' => 'list',
                        'items' => [
                            '<span class="inline-code">user</span>: the user to create or delete',
                            [
                                '<span class="inline-code">circleci</span>',
                            ],
                        ],
                    ],
                    [
                        'type' => 'heading-1',
                        'text' => 'Cloud Vars',
                        'id' => 'larasurf-cli-reference-cloud-vars',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'Command signature:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf cloud-vars <subcommand> --environment <environment> --key <key> --value <value> --values',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'Arguments:',
                    ],
                    [
                        'type' => 'list',
                        'items' => [
                            '<span class="inline-code">subcommand</span>: the subcommand to run',
                            [
                                '<span class="inline-code">exists</span>: determines if a cloud variable under the specified key exists for the specified environment',
                                [
                                    'does not require the <span class="inline-code">value</span> or <span class="inline-code">values</span> options',
                                ],
                                '<span class="inline-code">get</span>: gets the value of the cloud variable under the specified key for the specified environment',
                                [
                                    'does not require the <span class="inline-code">value</span> or <span class="inline-code">values</span> options',
                                ],
                                '<span class="inline-code">put</span>: sets or overwrites the value of a cloud variable under the specified key with the specified value for the specified environment',
                                [
                                    'does not require the <span class="inline-code">values</span> option',
                                ],
                                '<span class="inline-code">delete</span>: deletes the cloud variable under the specified key for the specified environment',
                                [
                                    'does not require the <span class="inline-code">value</span> or <span class="inline-code">values</span> options',
                                ],
                                '<span class="inline-code">list</span>: lists the existing cloud variables for the specified environment',
                                [
                                    'does not require the <span class="inline-code">key</span> or <span class="inline-code">value</span> options',
                                    'the <span class="inline-code">values</span> option is optional',
                                ],
                            ],
                        ],
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'Options:',
                    ],
                    [
                        'type' => 'list',
                        'items' => [
                            '<span class="inline-code">environment</span>: the cloud environment',
                            [
                                '<span class="inline-code">stage</span>',
                                '<span class="inline-code">production</span>',
                            ],
                            '<span class="inline-code">key</span>: the cloud variable key',
                            '<span class="inline-code">value</span>: the cloud variable value',
                            '<span class="inline-code">values</span>: specifies the listed cloud variables should display decrypted values',
                        ],
                    ],
                    [
                        'type' => 'heading-1',
                        'text' => 'Cloud Vars',
                        'id' => 'larasurf-cli-reference-config',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'Command signature:',
                    ],
                    [
                        'type' => 'code',
                        'text' => 'surf config <subcommand> <key> <value?>',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'Arguments:',
                    ],
                    [
                        'type' => 'list',
                        'items' => [
                            '<span class="inline-code">subcommand</span>: the subcommand to run',
                            [
                                '<span class="inline-code">get</span>: get the value under the specified key',
                                '<span class="inline-code">set</span>: set the value under the specified key to the specified value',
                            ],
                            '<span class="inline-code">key</span>: the configuration key',
                            [
                                'supports dot notation',
                            ],
                            '<span class="inline-code">value</span>: the value to set',
                            [
                                'only required for the <span class="inline-code">set</span> subcommand',
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ];

    public function view(Request $request)
    {
        $version = $request->query('v') ?: $this->default_version;

        if (isset($this->documentation[$version])) {
            $docs = $this->documentation[$version];
        } else {
            $docs = $this->documentation[$this->default_version];
        }

        return view('documentation', compact('docs'));
    }
}
