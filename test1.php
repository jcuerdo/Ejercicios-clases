<?php


class Person
{
    private $name;
    private $dni;
    private $age;

    public function __construct($name = null, $dni = null, $age = null)
    {
        //To do
        $this->name=$name;
        $this->dni=$dni;
        $this->age=$age;
    }

    public function getName()
    {
        //To do 
        return $this->name;
    }    

    public function setName($name)
    {
        //To do
        $this->name=$name;
    }

    public function getDni()
    {
        //To do
        return $this->dni;
    }

    public function setDni($dni)
    {
        //To do
        $this->dni=$dni;
    }

    public function getAge()
    {
        //To do
        return $this->age;
    }

    public function setAge($age)
    {
        //To do
        $this->age=$age;
    }
}

class Agenda
{
    private $persons;

    public function __construct(array $persons = [])
    {
        $this->persons = $persons;
    }

    public function addPerson(Person $person) 
    {
        //To do 
        $this->persons[]=$person;
    }

    public function addNewPerson($name, $dni, $age)
    {
        //To do 
         $person=new Person ($name, $dni, $age);
         $this->persons[]=$person;
    }

    public function deletePerson(Person $person)
    {
        //To do 
        //unset($person); 
        // Ha de ser:
        foreach($this->persons as $key => $currentPerson){
            if($currentPerson == $person){
                unset($this->persons[$key]);
            }
        }
        
        //Buscas la persona y una vez la encuentras, la borras.
    }

    public function deletePersonByDni($dni) 
    {
        //To do 
        
        foreach ($this->persons as $key => $fulanito) {
                if ($fulanito->getDni()== $dni) {
                   //unset($fulanito);
                    //Has de borrar del array
                    unset($this->persons[$key]);
                   }
        }
        
    }

    public function searchPersonByDni($dni)
    {
        //To do
       foreach ($this->persons as $fulanito) {
                if ($fulanito->getDni()== $dni) {
                    return $fulanito;
                    //Esto no hace falta $resultPerson = $fulanito;
                    }
        }
    }

    public function searchPersonsByName($name)
    {
        //Fijate en el nombre, search personS plural, hemos de buscar varias
        
        $results = [];
        
        //To do
       foreach ($this->persons as $fulanito) {
                if ($fulanito->getName()== $name) {
                    //return $fulanito;
                    //Si encontramos añadimos al array de resultados
                    $results[] = $fulanito;
                    }
        }            
        //AL terminar lo retornamos
        return $results;
    }

    public function getAllPersonByAge() // Lo de by age...
    {
        //To do order
        
        $all=$this->ordernar($this->persons);
        return $all;
       
    }
    
    //Es private, ya que es para uso interno, no lo exponemos afuera
    private function ordenar(array $persons){
      //Ordenamos primero y luego retornamos
      return $persons;
    }
}

$agenda = new Agenda();

$agenda->addNewPerson('Pepe', '1111', 22);
$agenda->addPerson(new Person('Manolo', '2222', 24));
$agenda->addPerson(new Person('Manolo', '3333', 19));

$person = new Person();
$person->setName('Jose');
$person->setDni('4444');
$person->setAge(44);

$agenda->addPerson($person);


$resultPerson = $agenda->searchPersonByDni('4444');
$resultPerson->setAge(99);


//Should be 99
echo $person->getAge();


$resultPerson = $agenda->searchPersonByDni('4444');
$resultPerson->setAge(99);

$all = $agenda->getAllPersonByAge();

//Should print 4 records with all the data fullfilled
foreach ($all as $person) {
    echo 'Name: ' . $person->getName() . ' DNI: ' . $person->getDni() . ' Age: ' . $person->getAge();
}


/** Complete the classes code */
