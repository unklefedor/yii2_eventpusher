# yii2_eventpusher
Module for Yii2. Push error events to monitor via web interface.

- в Config.php забиваем настройки уникальные для каждого сайта (сгенерить можно в мониторе)
- в экшене ошибки добавляем пушер
       $pusher = new EventPusher(EventFactory::getExceptionEvent(Yii::$app->errorHandler->exception));
       $pusher->send();
