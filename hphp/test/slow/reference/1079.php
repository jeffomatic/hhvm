<?hh

function f(&$a) {
 $a = 'ok';
}
 class T {
 public $b = 10;
}

 <<__EntryPoint>>
function main_1079() {
$a = new T();
 $a->b = 10;
 $__b = $a->b;
 f(&$__b);
 $a->b = $__b;
 var_dump($a);
}
