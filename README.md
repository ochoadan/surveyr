[![CircleCI](https://circleci.com/gh/Dev7studios/surveyr.svg?style=svg&circle-token=1541293007a8f12772a3e1ad402943256e8201e2)](https://circleci.com/gh/Dev7studios/surveyr)

# Surveyr

## Install

Surveyr uses [Vessel](https://vessel.shippingdocker.com/) to run on Docker.

```shell
cp .env.example .env
composer install --ignore-platform-reqs
./vessel start
```

## Usage

See the [Vessel docs](https://vessel.shippingdocker.com/docs/everyday-usage/) for more information.

```shell
./vessel composer install
./vessel artisan key:generate
./vessel artisan migrate
./vessel artisan storage:link
yarn && yarn dev
```

## Billing

Surveyr uses [Laravel Spark (Classic)](https://spark-classic.laravel.com/) for billing. You will be prompted for a GitHub token when running `composer install` to verify the Spark license. Fill in the `STRIPE_KEY` and `STRIPE_SECRET` in your `.env` file.
