会員情報操作メニュー画面(おそらく使わない。別途dashboardを用意)<br>

<?=$this->Html->link('会員検索', ['controller' => 'admin', 'action' => 'search']) ?><br>
<?=$this->Html->link('会員登録', ['controller' => 'admin', 'action' => 'register']) ?><br>

<br>
<?=$this->Html->link('ログアウト', ['controller' => 'login', 'action' => 'logout']) ?><br>
