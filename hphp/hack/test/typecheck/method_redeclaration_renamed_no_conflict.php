<?hh // strict

trait T1 {
  public function f(int $i): int {
    return 4;
  }

}

trait T2 {
  public function f(int $i): num {
    return 3.4;
  }
}

trait T3 {
  public function f(int $i): float {
    return 5.0;
  }
}

class C {
  use T1, T2, T3;

  public function g(int $k): int = T1::f;
  public function k(int $l): float = T3::f;
}

function f(): void {
  $c = new C();
  hh_show($c->f(4));
  hh_show($c->g(4));
  hh_show($c->k(4));
}
