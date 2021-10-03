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
                        'text' => 'CircleCI Workflows',
                        'id' => 'project-lifecycle-circleci-workflows',
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
                        'html' => 'For more information, see the <a href="#circleci-workflows">CircleCI Workflows</a> documentation.',
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
                        'html' => 'In order to generate a new LaraSurf project, visit <a href="https://larasurf.com/new" target="_blank">larasurf.com/new</a> in your browser.',
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
            ]
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
