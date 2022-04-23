<template>
    <h1 class="personal-main-info-header">Текущие поездки</h1>
    <div class="personal-drive-archive isset-drive">
        <table>
            <tr class="personal-drive-archive-header">
                <th>№</th>
                <th>Дата поездки</th>
                <th>Откуда</th>
                <th>Куда</th>
                <th>Водитель</th>
                <th>Автомобиль</th>
            </tr>
            <tr class="personal-drive-archive-text">
                <td>1</td>
                <td>11.11.2011</td>
                <td>Москва</td>
                <td>Санкт-Петербург</td>
                <td>Иванов Иван</td>
                <td>БМВ 5</td>
            </tr>
        </table>
    </div>
    <div class="personal-drive-empty">
        <h2 class="personal-drive-empty-text" id="drive-empty">Поездки не найдены</h2>
    </div>

    <h1 class="personal-main-info-header">Архив</h1>
    <div class="personal-drive-archive">
        <table>
            <tr class="personal-drive-archive-header">
                <th>№</th>
                <th>Дата поездки</th>
                <th>Откуда</th>
                <th>Куда</th>
                <th>Водитель</th>
                <th>Автомобиль</th>
            </tr>
            <tr class="personal-drive-archive-text">
                <td>1</td>
                <td>11.11.2011</td>
                <td>Москва</td>
                <td>Санкт-Петербург</td>
                <td><a class="personal-drive-archive-driver" href="#">Иванов Иван</a></td>
                <td>БМВ 5</td>
            </tr>
        </table>
    </div>
    <div class="personal-drive-empty isset-drive">
        <h2 class="personal-drive-empty-text" id="drive-empty">Поездки не найдены</h2>
    </div>

</template>

<script>
export default {
  name: 'TripsUser',

};

</script>

<style>

</style>
