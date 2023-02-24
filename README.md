<div align="center">
  <a href="https://larasurf.com">
    <img src="https://twemoji.maxcdn.com/svg/1f30a.svg" alt="Logo" width="80" height="80">
  </a>
<h1 align="center">LaraSurf</h1>

  <p align="center">
    LaraSurf combines Docker, CircleCI, and AWS to create an end-to-end solution for generating, implementing, and deploying Laravel applications.
    <br />
    <br />
    <a href="https://larasurf.com/how-it-works"><strong>How it works</strong></a>
    &bull;
    <a href="https://larasurf.com/docs"><strong>Documentation</strong></a>
    &bull;
    <a href="https://larasurf.com/new"><strong>New Project</strong></a>
    <br />
  </p>
</div>

[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

## Overview
This is the repository for the website at [larasurf.com](https://larasurf.com).

It contains the documentation and project generation script for [larasurf/larasurf](https://github.com/larasurf/larasurf).

## Areas of Interest
### Documentation
- Documentation data is in `resources/docs`

### Project Generation
- Project generation script is at `resources/generate.sh`
  - Script is preprocessed by `App\Http\Controllers\GenerateProjectController::generate`

## Contributing
- Issues, ideas, and pull requests are welcome
- See `CONTRIBUTING.md`

## ToDo
- Swap hardcoded PHP array containing documentation with equivalent markdown file(s)/parsing/styling
- Replace Laravel Mix with Vite
