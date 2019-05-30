<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    </p><h1 align="center"><a id="user-content-yii-2-advanced-project-template" class="anchor" aria-hidden="true" href="#yii-2-advanced-project-template"><svg class="octicon octicon-link" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M4 9h1v1H4c-1.5 0-3-1.69-3-3.5S2.55 3 4 3h4c1.45 0 3 1.69 3 3.5 0 1.41-.91 2.72-2 3.25V8.59c.58-.45 1-1.27 1-2.09C10 5.22 8.98 4 8 4H4c-.98 0-2 1.22-2 2.5S3 9 4 9zm9-3h-1v1h1c1 0 2 1.22 2 2.5S13.98 12 13 12H9c-.98 0-2-1.22-2-2.5 0-.83.42-1.64 1-2.09V6.25c-1.09.53-2 1.84-2 3.25C6 11.31 7.55 13 9 13h4c1.45 0 3-1.69 3-3.5S14.5 6 13 6z"></path></svg></a>Yii 2 Advanced Project Template</h1>
    <br>
<p></p>
<h1><a id="user-content---test-task-for-php-developer-" class="anchor" aria-hidden="true" href="#--test-task-for-php-developer-"><svg class="octicon octicon-link" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M4 9h1v1H4c-1.5 0-3-1.69-3-3.5S2.55 3 4 3h4c1.45 0 3 1.69 3 3.5 0 1.41-.91 2.72-2 3.25V8.59c.58-.45 1-1.27 1-2.09C10 5.22 8.98 4 8 4H4c-.98 0-2 1.22-2 2.5S3 9 4 9zm9-3h-1v1h1c1 0 2 1.22 2 2.5S13.98 12 13 12H9c-.98 0-2-1.22-2-2.5 0-.83.42-1.64 1-2.09V6.25c-1.09.53-2 1.84-2 3.25C6 11.31 7.55 13 9 13h4c1.45 0 3-1.69 3-3.5S14.5 6 13 6z"></path></svg></a>  Test task for PHP Developer </h1>
<h2><a id="user-content-minimal-application-for-exchange-of-cryptocurrencies" class="anchor" aria-hidden="true" href="#minimal-application-for-exchange-of-cryptocurrencies"><svg class="octicon octicon-link" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M4 9h1v1H4c-1.5 0-3-1.69-3-3.5S2.55 3 4 3h4c1.45 0 3 1.69 3 3.5 0 1.41-.91 2.72-2 3.25V8.59c.58-.45 1-1.27 1-2.09C10 5.22 8.98 4 8 4H4c-.98 0-2 1.22-2 2.5S3 9 4 9zm9-3h-1v1h1c1 0 2 1.22 2 2.5S13.98 12 13 12H9c-.98 0-2-1.22-2-2.5 0-.83.42-1.64 1-2.09V6.25c-1.09.53-2 1.84-2 3.25C6 11.31 7.55 13 9 13h4c1.45 0 3-1.69 3-3.5S14.5 6 13 6z"></path></svg></a>Minimal application for exchange of cryptocurrencies</h2><br>
<b>Entities:</b> users, users wallets, exchange rates, transactions. <br>
<b>Currencies : USD, BTC, ETH, DOGE, LTC</b> (you can choose any 4 cryptocurrencies instead of
BTC, ETH, DOGE, LTC) <br>
<h3><a id="user-content-user-can" class="anchor" aria-hidden="true" href="#user-can"><svg class="octicon octicon-link" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M4 9h1v1H4c-1.5 0-3-1.69-3-3.5S2.55 3 4 3h4c1.45 0 3 1.69 3 3.5 0 1.41-.91 2.72-2 3.25V8.59c.58-.45 1-1.27 1-2.09C10 5.22 8.98 4 8 4H4c-.98 0-2 1.22-2 2.5S3 9 4 9zm9-3h-1v1h1c1 0 2 1.22 2 2.5S13.98 12 13 12H9c-.98 0-2-1.22-2-2.5 0-.83.42-1.64 1-2.09V6.25c-1.09.53-2 1.84-2 3.25C6 11.31 7.55 13 9 13h4c1.45 0 3-1.69 3-3.5S14.5 6 13 6z"></path></svg></a>User can</h3>
<ul>
<li> Register/Authorize </li>
<li> Create several wallets for any currency </li>
<li> Search a wallet by user’s email and currency</li>
<li> View wallets all info</li>
<li> Edit custom name of a wallet</li>
<li> Update cryptocurrency rates using API <a href="https://coinlayer.com" rel="nofollow">https://coinlayer.com</a> and save those rates into the
DB, through the Yii2 module creation</li>
<li> View and edit rates of cryptocurrencies , that have been received by API .
Also, the application must have the option to block/unblock updating of a rate for each
currency</li>
<li> Make a currency exchange form between wallets</li>
</ul><br>
<h3><a id="user-content-the-exchange-form-contains-next-fields" class="anchor" aria-hidden="true" href="#the-exchange-form-contains-next-fields"><svg class="octicon octicon-link" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M4 9h1v1H4c-1.5 0-3-1.69-3-3.5S2.55 3 4 3h4c1.45 0 3 1.69 3 3.5 0 1.41-.91 2.72-2 3.25V8.59c.58-.45 1-1.27 1-2.09C10 5.22 8.98 4 8 4H4c-.98 0-2 1.22-2 2.5S3 9 4 9zm9-3h-1v1h1c1 0 2 1.22 2 2.5S13.98 12 13 12H9c-.98 0-2-1.22-2-2.5 0-.83.42-1.64 1-2.09V6.25c-1.09.53-2 1.84-2 3.25C6 11.31 7.55 13 9 13h4c1.45 0 3-1.69 3-3.5S14.5 6 13 6z"></path></svg></a>The exchange form contains next fields:</h3>
<ul>
<li> senders’ wallet,</li>
<li> recipients’ wallet recipient,</li>
<li> amount (currency of wallet-sender),</li>
<li> display the amount in currency of wallet-recipient, in a currency of wallet-sender using
ajax.</li>
<li> Implement the selection of wallets in form with Select2 .</li>
<li> View exchange-transactions history</li>
</ul><br>
<h3><a id="user-content-columns" class="anchor" aria-hidden="true" href="#columns"><svg class="octicon octicon-link" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M4 9h1v1H4c-1.5 0-3-1.69-3-3.5S2.55 3 4 3h4c1.45 0 3 1.69 3 3.5 0 1.41-.91 2.72-2 3.25V8.59c.58-.45 1-1.27 1-2.09C10 5.22 8.98 4 8 4H4c-.98 0-2 1.22-2 2.5S3 9 4 9zm9-3h-1v1h1c1 0 2 1.22 2 2.5S13.98 12 13 12H9c-.98 0-2-1.22-2-2.5 0-.83.42-1.64 1-2.09V6.25c-1.09.53-2 1.84-2 3.25C6 11.31 7.55 13 9 13h4c1.45 0 3-1.69 3-3.5S14.5 6 13 6z"></path></svg></a>Columns:</h3>
<li> Transaction ID,</li>
<li> Sender email,</li>
<li> Recipient email,</li>
<li> Currency of wallet-sender,</li>
<li> Currency of wallet-recipient,</li>
<li> Amount in currency of sender,</li>
<li> Amount in currency of recipient,</li>
<li> Wallet-sender custom name,</li>
<li> Wallet-recipient custom name</li><br>
<h2><a id="user-content-each-column-must-have-a-search-field-in-gridview" class="anchor" aria-hidden="true" href="#each-column-must-have-a-search-field-in-gridview"><svg class="octicon octicon-link" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M4 9h1v1H4c-1.5 0-3-1.69-3-3.5S2.55 3 4 3h4c1.45 0 3 1.69 3 3.5 0 1.41-.91 2.72-2 3.25V8.59c.58-.45 1-1.27 1-2.09C10 5.22 8.98 4 8 4H4c-.98 0-2 1.22-2 2.5S3 9 4 9zm9-3h-1v1h1c1 0 2 1.22 2 2.5S13.98 12 13 12H9c-.98 0-2-1.22-2-2.5 0-.83.42-1.64 1-2.09V6.25c-1.09.53-2 1.84-2 3.25C6 11.31 7.55 13 9 13h4c1.45 0 3-1.69 3-3.5S14.5 6 13 6z"></path></svg></a>Each column must have a search field in GridView.</h2>
<p>Prepare your app as follows:</p>
<ul>
<li>Register 3 users</li>
<li> Create a migration to top up usd-wallets with 1000 USD per each of previously mentioned 3
users.</li>
<li> Provide an UML-diagram of the DB structure.</li>
<li> Publish your application to any free hosting or be able to demonstrate it using TeamViewer
from your local machine.</li>
</ul>
<p><b>Keywords: Yii2 advanced, CRUD, PostgreSQL, CoinLayer API, Ajax, Select2, CSS Bootstrap,
Yii2 GridView, Yii2 Gii generator, Yii2 migration</b></p>


<br>

<h1>How to use service</h1>
<p>You could as <a href="login/">signup</a> as us existing users accounts:</p>
<ul>
    <li>login: <i>user1</i>; password: <i>test1@test.com</i></li>
    <li>login: <i>user2</i>; password: <i>test2@test.com</i></li>
    <li>login: <i>user3</i>; password: <i>test3@test.com</i></li>
</ul>
<img src="\frontend\web\images\СхемаБД.jpg" alt="">
</div>
