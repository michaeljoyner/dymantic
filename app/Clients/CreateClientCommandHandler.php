<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 4/21/2015
 * Time: 9:24 AM
 */

namespace Dymantic\Clients;


use Dymantic\Commanding\CommandHandler;

class CreateClientCommandHandler implements CommandHandler {

    /**
     * @var ClientRepository
     */
    private $clientRepository;

    /**
     * @param ClientRepository $clientRepository
     */
    public function __construct(ClientRepository $clientRepository)
    {

        $this->clientRepository = $clientRepository;
    }

    /**
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {
        return $this->clientRepository->create((array)$command);
    }
}