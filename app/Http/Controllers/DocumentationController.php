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
                        'class' => 'w-full lg:w-2/3'
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
                        'html' => 'For example: <span class="inline-code">surf composer --version</span>.'
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
                        'html' => 'For example: <span class="inline-code">surf yarn --version</span>.'
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
                        'html' => 'For example: <span class="inline-code">surf npx --version</span>.'
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
                        'html' => 'For example: <span class="inline-code">surf node --version</span>.'
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
                        'html' => 'For example: <span class="inline-code">surf awslocal --version</span>.'
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
                        'html' => 'For example: <span class="inline-code">surf artisan tinker</span>.'
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
                        'html' => 'For example: <span class="inline-code">surf test</span> or <span class="inline-code">surf test --filter MyTest</span>.',
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
                        'html' => 'For example: <span class="inline-code">surf config get aws-profile</span>.',
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
                        'text' => 'surf config set <key> <value></value>',
                    ],
                    [
                        'type' => 'paragraph',
                        'html' => 'For example: <span class="inline-code">surf config set aws-profile profile-name</span>.',
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
