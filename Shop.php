<?php


class Shop
{
    const SIZE = 5;

    public $queue = [];
    public $clients = [];

    public function __construct(array $clients)
    {
        $this->clients = $clients;
        $this->createQueue();
    }

    public function createQueue(){
        foreach (array_diff_key($this->clients, $this->queue) as $key => $client) {
            sleep(rand(1,3));
            print_r('Пришел клиент - ' . $client . "\n");
            $this->queue[] = $client;
            unset($this->clients[$key]);
            if(!$this->isSpaceQueue()){
                $this->servise();
                break;
            }
        }
    }

    public function servise(){
        foreach ($this->queue as $key => $client){
            sleep(rand(1,5));
            print_r('Обслужен клиент - ' . $client . "\n");
            unset($this->queue[$key]);
            if($this->isSpaceQueue() && !$this->isEmptyClients()){
                $this->createQueue();
                break;
            }
        }
    }

    public function isSpaceQueue(){
        $isSpace = (count($this->queue) != self::SIZE);
        return $isSpace;
    }

    public function isEmptyClients(){
        return count($this->clients) == 0;
    }
}