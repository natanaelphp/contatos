<?php

require '../vendor/autoload.php';

use Respect\Rest\Router;

use App\Services\DatabaseConnection;

use App\Repositories\UserRepository;
use App\Repositories\ContactRepository;
use App\Repositories\PhoneRepository;

use App\Services\UserService;

use App\Services\Contact\Create as CreateContactService;
use App\Services\Contact\Update as UpdateContactService;
use App\Services\Contact\Delete as DeleteContactService;
use App\Services\Contact\GetContact as GetContactService;

$pdo = (new DatabaseConnection())->getConnection();

$userRepository = new UserRepository($pdo);
$contactRepository = new ContactRepository($pdo);
$phoneRepository = new PhoneRepository($pdo);

$userService = new UserService($userRepository);

$createContactService = new CreateContactService($contactRepository, $phoneRepository);
$updateContactService = new UpdateContactService($contactRepository, $phoneRepository);
$deleteContactService = new DeleteContactService($contactRepository, $phoneRepository);
$getContactService = new GetContactService($contactRepository, $phoneRepository);

$router = new Router();

/*------------------------------------------------------------------------------

    User Routes

------------------------------------------------------------------------------*/

$router->get(['/', '/users'], function () use ($userRepository) {
    $users = $userRepository->getAll();
    require View('user/list');
});

$router->get('/users/create', function () {
    require View('user/new');
});

$router->post('/users', function () use ($userService) {
    if ($userService->isValidDataForCreate($_POST)) {
        $userService->create($_POST);
        redirect('/users');
    } else {
        $msg = $userService->getErrorMessage();
        require View('user/new');
    }
});

$router->get('/users/*/edit', function ($id) use ($userRepository) {
    $user = $userRepository->get($id);
    require View('user/edit');
});

$router->post('/users/*/edit', function ($id) use ($userService) {
    if ($userService->isValidDataForEdit($_POST)) {
        $userService->update($id, $_POST);
        redirect('/users');
    } else {
        $msg = $userService->getErrorMessage();
        require View('user/edit');
    }
});

$router->get('/users/*/delete', function ($id) use ($userRepository) {
    $user = $userRepository->get($id);
    require View('user/delete');
});

$router->post('/users/*/delete', function ($id) use ($userRepository) {
    $userRepository->delete($id);
    redirect('/users');
});

$router->get('/users/*/view', function ($id) use ($userRepository, $contactRepository) {
    $user = $userRepository->get($id);
    $contacts = $contactRepository->getContactsOfUser($user);

    require View('user/view');
});

/*------------------------------------------------------------------------------

    Contact Routes

------------------------------------------------------------------------------*/

$router->get('/users/*/contacts/create', function ($userId) {
    require View('contact/new');
});

$router->post('/users/*/contacts/create', function ($userId) use ($createContactService) {
    if ($createContactService->isValidData($_POST)) {
        $createContactService->fire($userId, $_POST);
        redirect('/users/'.$userId.'/view');
    } else {
        $msg = $createContactService->getErrorMessage();
        require View('contact/new');
    }
});

$router->get('/users/*/contacts/*/edit', function ($userId, $contactId) use ($updateContactService) {
    list($contact, $phones) = $updateContactService->getDataOfContact($contactId);
    require View('contact/edit');
});

$router->post('/users/*/contacts/*/edit', function ($userId, $contactId) use ($updateContactService) {
    if ($updateContactService->isValidData($_POST)) {
        $updateContactService->fire($contactId, $_POST);
        redirect('/users/'.$userId.'/view');
    } else {
        list($contact, $phones) = $updateContactService->getDataOfContact($contactId);
        $msg = $updateContactService->getErrorMessage();
        require View('contact/edit');
    }
});

$router->get('/users/*/contacts/*/delete', function ($userId, $contactId) use ($contactRepository) {
    $contact = $contactRepository->get($contactId);
    require View('contact/delete');
});

$router->post('/users/*/contacts/*/delete', function ($userId, $contactId) use ($deleteContactService) {
    $deleteContactService->fire($contactId);

    redirect('/users/'.$userId.'/view');
});

$router->get('/users/*/contacts/*', function ($userId, $contactId) use ($getContactService) {
    $contact = $getContactService->fire($contactId);

    require View('contact/view');
});









//
