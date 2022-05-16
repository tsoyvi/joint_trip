<template>
<div class="personal-drive-archive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>№</th>
                <th>Отправитель</th>
                <th>Сообщение</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>2</td>
                <td>Сервис ПоПути</td>
                <td>Вы присоединились к поездке...</td>
            </tr>
            <tr>
                <td>1</td>
                <td>Сервис ПоПути</td>
                <td>Вы зарегистрировались в сервисе ПоПути</td>
            </tr>
        </tbody>

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
