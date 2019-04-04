<?php

class Home extends CI_Controller /*implements MessageComponentInterface*/{
    private $clients;

//    public function __construct(){
//        parent::__construct();
//        $this->clients = new SplObjectStorage();
//    }

    public function index(){
        header("Access-Control-Allow-Origin: *");

//        $this->load->add_package_path(FCPATH.'vendor/romainrg/ratchet_client');
//        $this->load->library('ratchet_client');
//        $this->load->remove_package_path(FCPATH.'vendor/romainrg/ratchet_client');

        $this->load->template('home_page');
    }
//
//    /**
//     * When a new connection is opened it will be passed to this method
//     * @param  ConnectionInterface $conn The socket/connection that just connected to your application
//     * @throws \Exception
//     */
//    function onOpen(ConnectionInterface $conn)
//    {
//        $this->clients->attach($conn);
//    }
//
//    /**
//     * This is called before or after a socket is closed (depends on how it's closed).  SendMessage to $conn will not result in an error if it has already been closed.
//     * @param  ConnectionInterface $conn The socket/connection that is closing/closed
//     * @throws \Exception
//     */
//    function onClose(ConnectionInterface $conn)
//    {
//        $this->clients->detach($conn);
//    }
//
//    /**
//     * If there is an error with one of the sockets, or somewhere in the application where an Exception is thrown,
//     * the Exception is sent back down the stack, handled by the Server and bubbled back up the application through this method
//     * @param  ConnectionInterface $conn
//     * @param  \Exception $e
//     * @throws \Exception
//     */
//    function onError(ConnectionInterface $conn, \Exception $e)
//    {
//        // close connection with appropriate client
//        $conn->close();
//    }
//
//    /**
//     * Triggered when a client sends data through the socket
//     * @param  \Ratchet\ConnectionInterface $from The socket/connection that sent the message to your application
//     * @param  string $msg The message received
//     * @throws \Exception
//     */
//    function onMessage(ConnectionInterface $from, $msg)
//    {
//        // TODO: Implement onMessage() method.
//    }
}