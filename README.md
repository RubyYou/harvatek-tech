
harvatek-tech.com // rebuild the site with understandable, generatic code.

======================================================================

- 後台測試位置：
  http://nickchen.uphero.com/harvatek-tech/manager/

  
- 2014-04-25

  1.categories level third complete.
  
  2.測試位置更新.
  
- 2014-05-04

  1.add news and product control panel
  
  2.晚點會更新到我的測試位置
  
  另外，我有幾個問題
  1.關於 product 的
  quantity 和 color 裡的選項是固定的嗎？
  我有上舊的官網查quantity好像是固定的
  color的內容不是固定的  
  => 對，沒有錯！quality是固定的，color是不固定的！
  
  我在想
  color有沒有分類的邏輯呢？  
  => color嗎？ 
  基本上是跟著產品走，但是就蠻多各種不同的color，有蠻多有重複的！
  需要我把所有的列給你嗎？
  
  display下的可能color都是hyper red,super red...等?
  smd led下的color都是 yellow green,yellow...等？
  再麻煩你跟你朋友確認一下？
  如果沒有分類的邏輯的話，每個product有自己的color也是可以
  只是第一次在建產品資料的時候會比較累！
  必須一個產品一個產品上（我看產品還蠻多的...）

  => 我之前建產品的時候是一個一個加的，但是可以選，
  我先建好大概有哪些color，然後再依產品來選顏色，
  例如說: 先把所有可能的color先列出來，然後user可以選哪幾個，這樣不知道會比較快?

  
  2.inquiry cart 的內容要記在資料庫？（我忘了...sorry）
    => YES.

  3.contact us 的內容要記在資料庫？（我忘了...sorry）
    => YES.



- 2014-05-20
  inquiry cart done!!

  by Nick.
  
  Ruby: 進度完成了！是否有什麼方式可以架出來，讓我試著開始上傳產品呢？
  或是我可以直接上傳到你的遠端，測試看看，到時候再把資料庫一起搬過去，你也可以同時做後面的東西 :)
  ~ 我朋友有在問了~ 上傳產品應該要些時間，總覺得我要勤快一點了 :(

  喔對了~ 
  產品還有一個功能，就是如果他是有featured的，會到主頁面的featured~
  還有我想問搜詢產品編號會不會很難? 我們想加加看這個功能！
  >> 也許以上的這兩個功能再加上首頁的list可以讓我試試看，讓我上傳完產品，upload上去後。
  
  Nick:
  你跟你朋友說的時間是什麼時候？
  我可以先把資料庫清空，讓你上傳完之後，再傳到現在網站的位置。
  也可以邊測試看看有沒有問題。
  * 我這邊的話，先讓我把Color跟CRI的template改好後！！就可以開始
  
  >>還有我想問搜詢產品編號會不會很難? 我們想加加看這個功能！
  是在前端頁面要有這功能嗎？還是後台搜尋？
  >> 也許以上的這兩個功能再加上首頁的list可以讓我試試看，讓我上傳完產品，upload上去後。
  如果時間上ok的話我是可以讓你做看看
  
- 2014-05-22
  featured 的後台功能我加上去了！首頁我還沒套
  完成Color & Cri的修改，妳再看看這樣應該可以

- 2014-05-29
  明天準備上線！
  要麻煩你給我，
  1.ftp主機位置
  你的ftp主機位置應該是你上次給我的那個？
  2.mysql(phpMyAdmin)的位置
  帳號&密碼
  
- 2014-05-30
  設定檔
  config/config.main.front.php --- 前端網頁include設定
  config/config.main.php --- 管理後台網頁include設定
  config/config.php --- 網站設定檔
  config/db.config.php --- 資料庫連線設定
  config/config.local.php --- 本機測試網站設定檔
  config/db.config.local.php --- 本機測試資料庫連線設定
  
  libraries
  css --- 後台用的css
  js --- 後台用到的JS
  php --- 前後台共用的php程式
  php/js.lib.php ---
  這個特別說明一下，這是偷懶用php呼叫js的function
  如果覺得alert內容很醜，可以來這邊調整callAlert這個function
  
  modules
  自定義的class
  這邊應該只有用到
  Myadodb --- 資料庫套件
  mail.class.php --- 寄送mail
  main.class.php --- 資料庫class
  mydb.class.php --- 資料庫class
  paging.class.php --- 後台分頁class
  pri.class.php --- 後台登入權限class
  tree.class.php --- 後台側邊Tree class
  
  uploads
  後台上傳的資料夾
  
  manager
  管理介面資料夾
  
  
