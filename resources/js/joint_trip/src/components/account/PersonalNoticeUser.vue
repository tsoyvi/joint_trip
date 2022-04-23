<template>
  <h1 class="personal-main-info-header">Уведомления</h1>
<div class="personal-drive-archive">
    <table>
        <tr class="personal-drive-archive-header">
            <th>№</th>
            <th>Отправитель</th>
            <th>Сообщение</th>
        </tr>
        <tr class="personal-drive-archive-text">
            <td>2</td>
            <td>Сервис ПоПути</td>
            <td>Вы присоединились к поездке...</td>
        </tr>
        <tr class="personal-drive-archive-text">
            <td>1</td>
            <td>Сервис ПоПути</td>
            <td>Вы зарегистрировались в сервисе ПоПути</td>
        </tr>
    </table>
</div>
<div class="personal-drive-empty isset-drive">
    <h2 class="personal-drive-empty-text" id="drive-empty">Поездки не найдены</h2>
</div>

</template>

<script>
export default {
  name: 'NoticeUser',
};

</script>

<style>

</style>
