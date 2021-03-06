<?hh <<__EntryPoint>> function main(): void {
$uniqid = uniqid();
if (file_exists("/tmp/$uniqid.sock"))
    die('Temporary socket already exists.');

/* Setup socket server */
$server = stream_socket_server("unix:///tmp/$uniqid.sock");
if (!$server) {
    die('Unable to create AF_UNIX socket [server]');
}

/* Connect to it */
$client = stream_socket_client("unix:///tmp/$uniqid.sock");
if (!$client) {
    die('Unable to create AF_UNIX socket [client]');
}

/* Accept that connection */
$socket = stream_socket_accept($server);
if (!$socket) {
    die('Unable to accept connection');
}

fwrite($client, "ABCdef123\n");

$data = fread($socket, 10);
var_dump($data);

fclose($client);
fclose($socket);
fclose($server);
unlink("/tmp/$uniqid.sock");
}
