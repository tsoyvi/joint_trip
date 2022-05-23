<template>
  <main class="main-content">
    <div class="container">
      <h1 class="page-header">Контакты</h1>
      <p>
        Для связи с нами воспользуйтесь формой ниже. Мы ответим вам сразу, как только сможем!
      </p>
      <form class="contact-form">
        <label for="name">
        <input id="name" type="text" placeholder="Имя">
        </label>
        <label for="tel">
        <input id="tel" type="tel" placeholder="Телефон">
        </label>
        <label for="email">
        <input id="email" type="email" placeholder="e-mail">
        </label>
        <label for="messege">
        <textarea name="" id="messege" cols="30" rows="5" placeholder="Сообщение"></textarea>
        </label>
        <button class="form-btn contact-btn">Отправить</button>
      </form>
    </div>
  </main>
</template>
