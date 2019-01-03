<template>
  <div>
    <template-app :title="'O klubie'">
      <template slot="content">
        <p>Parafialno-Gminny Klub Sportowy "Frassati" Fajsławice powstał w 1998 roku z inicjatywy ks. Władysława Wójtowicza ówczesnego proboszcza parafii pw. św. Jana Nepomucena w Fajsławicach. Nazwa "Frassati" zaczerpnięta została od nazwiska włoskiego Błogosławionego Piotra Jerzego Frassatiego (1901-1925) - patrona młodzieży, studentów, ludzi gór i Akcji Katolickiej. Pierwsze spotkania drużyna rozgrywała w B Klasie II grupy lubelskiej. Od sezonu 2000/2001 (po reformie administracyjnej w 1999 roku) zespół został przeniesiony do A Klasy okręgu chełmskiego. Sekcja piłki nożnej składa się z 4 drużyn: seniorów, juniorów, trampkarzy i młodzików. Klub współpracuje ze Szkołą Podstawową i Gimnazjum w Fajsławicach w ramach szkolenia grupy młodzików i trampkarzy. Drużyna oparta jest na zawodnikach z gminy Fajsławice oraz innych gmin ościennych.</p>
      </template>
    </template-app>
  </div>
</template>

<script>
import TemplateApp from "../TemplateApp";
export default {
  name: "club-info",
  components: { TemplateApp }
};
</script>
