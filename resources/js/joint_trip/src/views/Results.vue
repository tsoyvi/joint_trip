<template>
  <main class="main-content">
    <section class="main-form results">

      <div class="main-form-content">

        <div class="main-form-box results">
          <SearchBar/>
        </div>

      </div>
    </section>
    <section class="results-section">
      <div class="container">
        <ul class="result-list">
          <li>
            <div class="result-card">
              <a href="#">
                <div class="result-card-top">
                  <div class="result-card-route">
                    <div class="result-card-halt">
                      <div>01:00</div>
                      <div>Ижевск</div>
                    </div>
                    <div class="result-card-halt">
                      <div></div>
                      <div class="result-card-halt-delimeter">|</div>
                    </div>
                    <div class="result-card-halt">
                      <div>05:50</div>
                      <div>Казань</div>
                    </div>
                  </div>
                  <div>500,00 Р</div>
                </div>
                <div class="result-card-bottom">
                  <div class="result-card-driver">
                    <div>
                      <img class="driver-img" src="/images/vodila.jpg" alt="Водитель" />
                    </div>
                    <div class="driver-name">Вика</div>
                  </div>
                  <div class="driver-tickets">2 места</div>
                </div>
              </a>
            </div>
          </li>
          <li>
            <div class="result-card">
              <a href="#">
                <div class="result-card-top">
                  <div class="result-card-route">
                    <div class="result-card-halt">
                      <div>01:00</div>
                      <div>Ижевск</div>
                    </div>
                    <div class="result-card-halt">
                      <div></div>
                      <div class="result-card-halt-delimeter">|</div>
                    </div>
                    <div class="result-card-halt">
                      <div>05:50</div>
                      <div>Казань</div>
                    </div>
                  </div>
                  <div>500,00 Р</div>
                </div>
                <div class="result-card-bottom">
                  <div class="result-card-driver">
                    <div>
                      <img class="driver-img" src="/images/vodila.jpg" alt="Водитель" />
                    </div>
                    <div class="driver-name">Вика</div>
                  </div>
                  <div class="driver-tickets">2 места</div>
                </div>
              </a>
            </div>
          </li>
          <li>
            <div class="result-card">
              <a href="#">
                <div class="result-card-top">
                  <div class="result-card-route">
                    <div class="result-card-halt">
                      <div>01:00</div>
                      <div>Ижевск</div>
                    </div>
                    <div class="result-card-halt">
                      <div></div>
                      <div class="result-card-halt-delimeter">|</div>
                    </div>
                    <div class="result-card-halt">
                      <div>05:50</div>
                      <div>Казань</div>
                    </div>
                  </div>
                  <div>500,00 Р</div>
                </div>
                <div class="result-card-bottom">
                  <div class="result-card-driver">
                    <div>
                      <img class="driver-img" src="/images/vodila.jpg" alt="Водитель"
                      />
                    </div>
                    <div class="driver-name">Вика</div>
                  </div>
                  <div class="driver-tickets">2 места</div>
                </div>
              </a>
            </div>
          </li>
        </ul>
      </div>
    </section>
  </main>
</template>

<script>
// @ is an alias to /src
// import HelloWorld from '../components/HelloWorld.vue';

import SearchBar from '../components/search/SearchBar.vue';

export default {
  name: 'ResuLts',
  components: {
    SearchBar,
  },
  data() {
    return {

    };
  },

};
</script>
