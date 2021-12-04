window.onRoistatAllModulesLoaded = function () {
    roistat.leadHunter.onBeforeSubmit = function(lead) {
        lead.isNeedCallback = 1; // 1 - включить Обратный звонок, 0 - выключить
        lead.callbackPhone = 78129159153; //Номер для обратного звонка
        lead.fields = {
            //Массив дополнительных полей
            "RESPONSIBLE_USER_ID": "123" //ID ответственного менеджера для сделки в amoCRM
        }
    }
};