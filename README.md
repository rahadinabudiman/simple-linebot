# line-bot-tutorial

A multifunctional LINE@-bot that is able to [find](https://ashura.id/nim) the NIM (Nomor Induk Mahasiswa) of an ITB student based on their name or vice versa, fetch random photos from an Instagram user (regex and crawl), _be taught_ words and answer them based on the corresponding answers (Google Firebase), calculate simple mathematics expressions (MathJS API), generate memes (MemeGenerator API), and display random comics from xkcd.com (xkcd API).

Made with PHP, mainly to complement the LINE@ Messenger Bot Tutorial that can be found [on my blog](https://blog.ashura.id/category/line/).

### How-to

* Create a new "env" folder (line-bot-tutorial\env).
* Create a .env file with the following as inside:
```
CHANNEL_ACCESS_TOKEN="YOUR_CHANNEL_ACCESS_TOKEN"
CHANNEL_SECRET="YOUR_CHANNEL_SECRET"
PASS_SIGNATURE=true
```
* Put your channel access token and channel secret to the .env file in \env directory.
* Edit YOUR_FIREBASE_PROJECT_ID in index.php (line 71) and handler/post.php (line 5).
* Edit YOUR_MEMEGENERATOR_API_KEY in handler/memeid.php (line 8) and handler/meme.php (line 9).
* Install Messaging API for your LINE@ account and deploy to Heroku. See [here](https://blog.ashura.id/membuat-line-messenger-bot-part-1/).

### Tips

* Another way to deploy to Heroku is by using Heroku CLI. The tutorial can be found [here](https://devcenter.heroku.com/articles/heroku-cli).
* To see the bot in action, add [@blo0465t](http://line.me/ti/p/~@blo0465t) (Practice Bot) as friends in LINE Messenger.
