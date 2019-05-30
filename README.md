<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 Advanced Project Template</h1>
    <br>
</p>

<h1>  Test task for PHP Developer </h1>

<h2>Minimal application for exchange of cryptocurrencies</h2><br>
<b>Entities:</b> users, users wallets, exchange rates, transactions. <br>
<b>Currencies : USD, BTC, ETH, DOGE, LTC</b> (you can choose any 4 cryptocurrencies instead of
BTC, ETH, DOGE, LTC) <br>
<h3>User can</h3>
<ul>
<li> Register/Authorize </li>
<li> Create several wallets for any currency </li>
<li> Search a wallet by user’s email and currency</li>
<li> View wallets all info</li>
<li> Edit custom name of a wallet</li>
<li> Update cryptocurrency rates using API https://coinlayer.com and save those rates into the
DB, through the Yii2 module creation</li>
<li> View and edit rates of cryptocurrencies , that have been received by API .
Also, the application must have the option to block/unblock updating of a rate for each
currency</li>
<li> Make a currency exchange form between wallets</li>
</ul><br>

<h3>The exchange form contains next fields:</h3>
<ul>
<li> senders’ wallet,</li>
<li> recipients’ wallet recipient,</li>
<li> amount (currency of wallet-sender),</li>
<li> display the amount in currency of wallet-recipient, in a currency of wallet-sender using
ajax.</li>
<li> Implement the selection of wallets in form with Select2 .</li>
<li> View exchange-transactions history</li>
</ul><br>

<h3>Columns:</h3>
<li> Transaction ID,</li>
<li> Sender email,</li>
<li> Recipient email,</li>
<li> Currency of wallet-sender,</li>
<li> Currency of wallet-recipient,</li>
<li> Amount in currency of sender,</li>
<li> Amount in currency of recipient,</li>
<li> Wallet-sender custom name,</li>
<li> Wallet-recipient custom name</li><br>

<h2>Each column must have a search field in GridView.</h2>
<p>Prepare your app as follows:</p>
<ul>
<li>Register 3 users</li>
<li> Create a migration to top up usd-wallets with 1000 USD per each of previously mentioned 3
users.</li>
<li> Provide an UML-diagram of the DB structure.</li>
<li> Publish your application to any free hosting or be able to demonstrate it using TeamViewer
from your local machine.</li>
</ul>

<b>Keywords: Yii2 advanced, CRUD, PostgreSQL, CoinLayer API, Ajax, Select2, CSS Bootstrap,
Yii2 GridView, Yii2 Gii generator, Yii2 migration</b>


<br>

<h1>How to use service</h1>
<p>You could as <a href="login/">signup</a> as us existing users accounts:</p>
<ul>
    <li>login: <i>user1</i>; password: <i>test1@test.com</i></li>
    <li>login: <i>user2</i>; password: <i>test2@test.com</i></li>
    <li>login: <i>user3</i>; password: <i>test3@test.com</i></li>
</ul>
<img src="https://github.com/ArtemBaranovsky/ewallet/blob/master/frontend/web/images/%D0%A1%D1%85%D0%B5%D0%BC%D0%B0%D0%91%D0%94.jpg" alt="">

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

