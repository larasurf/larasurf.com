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
                        'html' => 'While we <strong>highly recommend</strong> reading the documentation in its entirety before getting started, you can check out the <a href="/docs#tldr-checklist">TL;DR Checklist</a> to guide you through local setup and launch within 90 minutes.',
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
                                'See the <a href="/docs#project-lifecycle">Project Lifecycle</a>',
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
                            'Automated image building and deployments for specific branches (<pre class="inline-code">stage</pre> or <pre class="inline-code">main</pre>)',
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
                                'Via <pre class="inline-code">.env</pre> file locally',
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
