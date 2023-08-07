<?php
    require_once './vendor/autoload.php';

    use Office365\GraphServiceClient;
    use Office365\Runtime\Auth\AADTokenProvider;
    use Office365\Runtime\Auth\UserCredentials;


    function acquireToken()
    {
        $tenant = ".onmicrosoft.com";
        $resource = "https://graph.microsoft.com";

        $provider = new AADTokenProvider($tenant);
        return $provider->acquireTokenForPassword($resource, "{clientId}",
            new UserCredentials("{UserName}", "{Password}"));
    }

    $client = new GraphServiceClient("acquireToken");
    $drive = $client->getMe()->getDrive();
    $client->load($drive);
    $client->executeQuery();
    print $drive->getWebUrl();

?>

