<?hh

function gen() {
  echo "before yield\n";
  try {
    yield;
  } catch (RuntimeException $e) {
    echo $e, "\n\n";
  }

  yield 'result';
}

$gen = gen();
$gen->next();
$gen->throw(new RuntimeException('Test'));
var_dump($gen->current());
