<?hh // strict

class A {
  private const int MAX_ARGS = 5;
}
class B extends A {
  public function get_int():int{
    return A::MAX_ARGS;
  }
}
