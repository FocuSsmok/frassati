<template>
  <div>
    <template-app :title="'O klubie'">
      <template slot="content">
        <div class="content-wrapper about">
          <page-title title="O Klubie"/>
          <p>
            <h5 class="about__title">Parafialno-Gminny Klub Sportowy Frassati Fajsławice</h5>
            <ul>
              <li>
                <span>Rok założenia:</span>
                <span>1998</span>
              </li>
              <li>
                <span>Barwy:</span>
                <span>Niebiesko-żółto-zielone</span>
              </li>
              <li>
                <span>NIP:</span>
                <span>564-15-07-149</span>
              </li>
              <li>
                <span>KRS:</span>
                <span>0000063758</span>
              </li>
              <li>
                <span>Nr konta:</span>
                <span>19 8200 1034 2004 3400 0097 0001</span>
              </li>
              <li>
                <span>Trener seniorów:</span>
                <span>Daniel Krakiewicz</span>
              </li>
              <li>
                <span>Trener juniorów:</span>
                <span>Daniel Krakiewicz</span>
              </li>
              <li>
                <span>Asystent trenera juniorów:</span>
                <span>Michał Młynarczyk</span>
              </li>
              <li>
                <span>Trener grup młodzieżowych:</span>
                <span>Artur Gąsak</span>
              </li>
            </ul>
          </p>
          <p>Parafialno-Gminny Klub Sportowy "Frassati" Fajsławice powstał w 1998 roku z inicjatywy ks. Władysława Wójtowicza ówczesnego proboszcza parafii pw. św. Jana Nepomucena w Fajsławicach. Nazwa "Frassati" zaczerpnięta została od nazwiska włoskiego Błogosławionego Piotra Jerzego Frassatiego (1901-1925) - patrona młodzieży, studentów, ludzi gór i Akcji Katolickiej. Pierwsze spotkania drużyna rozgrywała w B Klasie II grupy lubelskiej. Od sezonu 2000/2001 (po reformie administracyjnej w 1999 roku) zespół został przeniesiony do A Klasy okręgu chełmskiego. Sekcja piłki nożnej składa się z 4 drużyn: seniorów, juniorów, trampkarzy i młodzików. Klub współpracuje ze Szkołą Podstawową i Gimnazjum w Fajsławicach w ramach szkolenia grupy młodzików i trampkarzy. Drużyna oparta jest na zawodnikach z gminy Fajsławice oraz innych gmin ościennych.</p>
          <div class="about__img">
            <figure>
              <img src="../../../../../../public/images/pages/about/patron.jpg" alt="" srcset="">
              <figcaption>Pier Giorgio Frassati</figcaption>
            </figure>
          </div>
        </div>
      </template>
    </template-app>
  </div>
</template>

<script>
import PageTitle from "../title/PageTitle";
import TemplateApp from "../TemplateApp";
export default {
  name: "club-info",
  components: { TemplateApp, PageTitle }
};
</script>
<style lang="scss" scoped>
.about__title {
  font-weight: bold;
}
p {
  margin-bottom: 20px;
}
.about {
  figure {
    text-align: center;
  }
}
</style>

