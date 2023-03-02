<?php
include("./inc_ADMIN/menu.inc.php");
?>
<?php
require_once '../vendor/autoload.php'; 
$analytics = initializeAnalytics(); // Initialisera l'API
$profile = getFirstProfileId($analytics); // Récupère le profil Google Analytics
// Fonction d'initialisation et d'authentification


function initializeAnalytics()
{
	// Précise où trouver la clé du compte de service
	$KEY_FILE_LOCATION =  '../motorify-2023-bad296ea02d8.json';

	// Crée et configure le client
	$client = new Google_Client();
	$client->setApplicationName("Hello Analytics Reporting");
	$client->setAuthConfig($KEY_FILE_LOCATION);
	$client->setScopes(['https://www.googleapis.com/auth/analytics.readonly']);
	$analytics = new Google_Service_Analytics($client);
	return $analytics;
}
// Récupère le profil Google Analytics
function getFirstProfileId($analytics) {
    // Récupère la liste des comptes
    $accounts = $analytics->management_accounts->listManagementAccounts();
    if (count($accounts->getItems()) > 0) {
        $items = $accounts->getItems();
        $firstAccountId =$items[0]["id"];
        // Récupère la liste des propriétés
       $properties = $analytics->management_webproperties->listManagementWebproperties("259012811");
    
        if (count($properties->getItems()) > 0) {
          $items = $properties->getItems();
          var_dump($items);
          $firstPropertyId = "356216937";
    
          // Récupère la liste des vues
          $profiles = $analytics->management_profiles->listManagementProfiles($firstAccountId, $firstPropertyId);
    
          if (count($profiles->getItems()) > 0) {
            $items = $profiles->getItems();
    
            // Retourne l'ID de la première vue
            return $items[0]["id"];
    
          } else {
            throw new Exception('No views (profiles) found for this user.');
          }
        } else {
          throw new Exception('No properties found for this user.');
        }
      } else {
        throw new Exception('No accounts found for this user.');
      }
}

?>
<?php
include("./inc_ADMIN/footer.html")
?>