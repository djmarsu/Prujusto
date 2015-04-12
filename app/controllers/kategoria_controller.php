<?php

class KategoriaController extends BaseController {
  public static function listaa() {
    $kategoriat = Kategoria::all();
    View::make('kategoria/listaus.html', array('kategoriat' => $kategoriat));
  }

  public static function show($nimi) {
    $postaus = Kategoria::find($nimi);
    View::make('kategoria/esittely.html', array('kategoria' => $kategoria));
  }

  public static function luokategoria($nimi) {
  }

  public static function kategorizoi($kategoriat, $postausid) {
    $kategoriapalaset = explode(",", $kategoriat);
    foreach ($kategoriapalaset as $kategoria) {
      if (!empty($kategoria)) {
        $kategoria = new Kategoria(array(
          'nimi' => $kategoria
        ));

        $kategoria->luo();
        $kategoria->liita_postaukseen($postausid);
      }
    }

  }
}

