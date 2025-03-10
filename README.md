# Surveyr

**Surveyr** was a cron monitoring tool designed for PHP applications. It alerts users when their cron jobs fail, ensuring timely awareness of issues.

## Installation

Surveyr leverages [Vessel](https://vessel.shippingdocker.com/) to run seamlessly within a Docker environment. Follow these steps to get started:

1. **Set up the environment file:**
   ```bash
   cp .env.example .env
   ```
   Edit `.env` as needed (e.g., database credentials, app key, etc.).

2. **Install dependencies:**
   ```bash
   composer install --ignore-platform-reqs
   ```

3. **Start Vessel:**
   ```bash
   ./vessel start
   ```
   This launches the Docker containers for Surveyr.

> **Note:** Ensure Docker is installed and running on your system before proceeding. See the [Vessel documentation](https://vessel.shippingdocker.com/docs/installation/) for setup details.

## Usage

Once installed, use Vessel to manage Surveyr’s setup and development workflow. Refer to the [Vessel Everyday Usage Guide](https://vessel.shippingdocker.com/docs/everyday-usage/) for additional commands and tips.

Run these commands to configure Surveyr:

```bash
./vessel composer install          # Install PHP dependencies
./vessel artisan key:generate      # Generate a unique app key
./vessel artisan migrate           # Run database migrations
./vessel artisan storage:link      # Link storage for file access
yarn && yarn dev                   # Install and build frontend assets
```

After completing these steps, Surveyr will be ready to monitor your cron jobs.

## Billing

Surveyr integrates [Laravel Spark (Classic)](https://spark-classic.laravel.com/) for subscription and billing management. To set it up:

1. **Composer GitHub Token:**  
   When running `composer install`, you’ll be prompted for a GitHub token to authenticate your Laravel Spark license. Provide a valid token with appropriate permissions.

2. **Stripe Configuration:**  
   Add your Stripe credentials to the `.env` file:
   ```
   STRIPE_KEY=your_stripe_public_key
   STRIPE_SECRET=your_stripe_secret_key
   ```

   These keys are required for processing payments and managing subscriptions.

> **Tip:** Test your Stripe integration in development using Stripe’s test keys before deploying to production.
