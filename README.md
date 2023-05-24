# Project Setup Guide

This guide will walk you through the steps to set up a this project.

## Prerequisites

Before you begin, make sure you have the following installed on your machine:

- PHP 8.2
- Composer
- Node.js (>= 16)
- NPM or Yarn

## Installation

- cp .env.example .env
- php artisan key:generate
- php artisan serve

## Result 

Visit http://localhost:8000 in your web browser, and you should see the project wizard page.

## Functionality

- stepAdd(): Adds a new step to the wizard. Increments activeStep if it's the first step.

- changeStep($value): Changes the active step to the specified value.

- nextStep(): Moves to the next step, performs input validation, and increments activeStep.

- previousStep(): Moves to the previous step by decrementing activeStep.

- removeStep($index): Removes a step based on the provided index and adjusts activeStep.

- reviewFrom(): Displays the review form by setting showStep to false and showReviewFrom to true.

- closeReviewFrom(): Closes the review form by setting showStep to true and showReviewFrom to false.

- goToStep($value): Navigates back to a specific step by setting activeStep and adjusting showStep and showReviewFrom.
# dynamic_livewire_from_wizard
