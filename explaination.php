Incomplete API

Ideaal zou zijn dat de gegevens allemaal worden opgeslagen van de bedrijven, vestigingen en werknemers.
Gezien je dat allemaal niet perse wilt opslaan en alleen de gegevens nodig heb wilt opslaan is een foreach loop erg geheugenvretend.

Ik begin met de mapping van de gewenste data en waar de data vandaan gehaald wordt:
- employee_id 	= /api/company/{id}/office/{id}/employees -> id
- naam 			= /api/company/{id}/office/{id}/employees -> name
- e-mailadres 	= /api/company/{id}/office/{id}/employees -> e-mailadres
- foto 			= /api/company/{id}/office/{id}/employees -> foto
- bezoekadres 	= /api/company/{id}/offices -> straat, huisnummer, postcode en plaats
- bedrijfsnaam 	= /api/companies -> naam
- website 		= /api/company/{id} -> website
- functie 		= /api/company/{id}/office/{id}/employees -> functie (accountmanager of salesmanager)

Om het geheugenprobleem tegen te gaan zou ik per bedrijf per vestiging de werknemersgegevens ophalen:

$companies = API::getCompanies();

foreach ($companies as $company) {

	$companyInfo = API::getCompany($company->id);
	$companyOffices = API::getCompanyOffices($company->id);

	foreach ($companyOffices as $office) {

		$officeEmployees = API::getOfficeEmployees($office->id);

		foreach ($officeEmployees as $employee) {
			if (in_array($employee->function, ['accountmanager', 'salesmanager'])) {

				$localEmployee = Employee::findByEmail($employee->email);

				if (!$localEmployee) {
					// Create new
					$localEmployee = new Employee();
				}

				$localEmployee->name = $employee->name;
				$localEmployee->email = $employee->email;
				$localEmployee->photo = $employee->photo;
				$localEmployee->address = $office->address . ' ' . $office->housenumber . ', ' . $office->zipcode . ', ' . $office->city;
				$localEmployee->company_name = $company->name;
				$localEmployee->website = $companyInfo->website;
				$localEmployee->function = $employee->function;
				
				$localEmployee->save();
			}
		}
	}
}

Als ik de keuze heb om de bedrijven en vestigingen ook in tabellen kan opslaan, kan er bij een vestiging een flag worden gezet voor het updaten van de werknemers en bijhouden wanneer deze voor het laatste was geweest.
Tevens kan hiermee gecontroleerd worden wat de laatst 

