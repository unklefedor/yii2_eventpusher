# yii2_eventpusher
Module for Yii2. Push error events to monitor via web interface.

- после настройки экшена ошибки на Yii2 устанавливаем из композера модуль "unklefedor/yii2_eventpusher"
- в самом модуле, который будет лежать в "vendor/unklefedor/yii2_eventpusher/src" в Config.php забиваем настройки уникальные для каждого сайта (сгенерить можно в мониторе)
- в экшене ошибки добавляем пушер
       $pusher = new EventPusher(EventFactory::getExceptionEvent(Yii::$app->errorHandler->exception));
       $pusher->send();
