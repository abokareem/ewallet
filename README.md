<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 Advanced Project Template</h1>
    <br>
</p>

<h1>  Test task for PHP Developer </h1>

<p>Minimal application for exchange of cryptocurrencies<p>
Entities: users, users wallets, exchange rates, transactions
Currencies : USD, BTC, ETH, DOGE, LTC (you can choose any 4 cryptocurrencies instead of
BTC, ETH, DOGE, LTC)
User can
- Register/Authorize
- Create several wallets for any currency
- Search a wallet by user’s email and currency
- View wallets all info
- Edit custom name of a wallet
- Update cryptocurrency rates using API https://coinlayer.com and save those rates into the
DB, through the Yii2 module creation
- View and edit rates of cryptocurrencies , that have been received by API .
Also, the application must have the option to block/unblock updating of a rate for each
currency
- Make a currency exchange form between wallets
The exchange form contains next fields:
● senders’ wallet,
● recipients’ wallet recipient,
● amount (currency of wallet-sender),
- display the amount in currency of wallet-recipient, in a currency of wallet-sender using
ajax.
- Implement the selection of wallets in form with Select2 .
- View exchange-transactions history
Columns:
● Transaction ID,
● Sender email,
● Recipient email,
● Currency of wallet-sender,
● Currency of wallet-recipient,
● Amount in currency of sender,
● Amount in currency of recipient,
● Wallet-sender custom name,
● Wallet-recipient custom name
Each column must have a search field in GridView.
Prepare your app as follows:
- Register 3 users
- Create a migration to top up usd-wallets with 1000 USD per each of previously mentioned 3
users.
- Provide an UML-diagram of the DB structure.
- Publish your application to any free hosting or be able to demonstrate it using TeamViewer
from your local machine.

Keywords: Yii2 advanced, CRUD, PostgreSQL, CoinLayer API, Ajax, Select2, CSS Bootstrap,
Yii2 GridView, Yii2 Gii generator, Yii2 migration


Yii 2 Advanced Project Template is a skeleton [Yii 2](http://www.yiiframework.com/) application best for
developing complex Web applications with multiple tiers.

The template includes three tiers: front end, back end, and console, each of which
is a separate Yii application.

The template is designed to work in a team development environment. It supports
deploying the application in different environments.

Documentation is at [docs/guide/README.md](docs/guide/README.md).

[![Latest Stable Version](https://img.shields.io/packagist/v/yiisoft/yii2-app-advanced.svg)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Total Downloads](https://img.shields.io/packagist/dt/yiisoft/yii2-app-advanced.svg)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Build Status](https://travis-ci.org/yiisoft/yii2-app-advanced.svg?branch=master)](https://travis-ci.org/yiisoft/yii2-app-advanced)

DIRECTORY STRUCTURE
-------------------

```
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
    tests/               contains tests for common classes    
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
backend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for backend application    
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
frontend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains frontend configurations
    controllers/         contains Web controller classes
    models/              contains frontend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for frontend application
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
    widgets/             contains frontend widgets
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
```
"# ewallet" 
