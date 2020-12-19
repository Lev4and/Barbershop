<?php
class QueryExecutor
{
    protected static $instance;

    private $contextDb;

    private function __construct(){
        $this->contextDb = new PDO("mysql:dbname=barbershop;host=localhost", "root", "root");
    }

    public static function getInstance(){
        if(!isset(self::$instance)){
            self::$instance = new QueryExecutor();
        }

        return self::$instance;
    }

    public function authorization($login, $password){
        return !is_null($this->executeQuery("SELECT * FROM user WHERE login='$login' AND password='$password' LIMIT 1")[0]);
    }

    public function getUser($login){
        return $this->executeQuery("SELECT * FROM v_user WHERE login='$login' LIMIT 1")[0];
    }

    public function containsUser($login){
        return !is_null($this->executeQuery("SELECT * FROM user WHERE login='$login' LIMIT 1")[0]);
    }

    public function registration($roleId, $login, $password){
        $this->executeQuery("INSERT INTO user (role_id, login, password) VALUES($roleId, '$login', '$password')");
    }

    public function getRoles(){
        return $this->executeQuery("SELECT * FROM role");
    }

    public function getCategoriesService(){
        return $this->executeQuery("SELECT * FROM category");
    }

    public function containsCategoryService($name){
        return !is_null($this->executeQuery("SELECT * FROM category WHERE name='$name' LIMIT 1")[0]);
    }

    public function addCategoryService($name){
        $this->executeQuery("INSERT INTO category (name) VALUES ('$name')");
    }

    public function getCategoryService($id){
        return $this->executeQuery("SELECT * FROM category WHERE id=$id LIMIT 1")[0];
    }

    public function updateCategoryService($id, $name){
        $this->executeQuery("UPDATE category SET name='$name' WHERE id=$id");
    }

    public function removeCategoryService($id){
        $this->executeQuery("DELETE FROM category WHERE id=$id");
    }

    public function getDurations(){
        return $this->executeQuery("SELECT * FROM duration");
    }

    public function containsDuration($value){
        return !is_null($this->executeQuery("SELECT * FROM duration WHERE value='$value' LIMIT 1")[0]);
    }

    public function addDuration($value){
        $this->executeQuery("INSERT INTO duration (value) VALUES ('$value')");
    }

    public function getDuration($id){
        return $this->executeQuery("SELECT * FROM duration WHERE id='$id' LIMIT 1")[0];
    }

    public function updateDuration($id, $value){
        $this->executeQuery("UPDATE duration SET value='$value' WHERE id=$id");
    }

    public function removeDuration($id){
        $this->executeQuery("DELETE FROM duration WHERE id=$id");
    }

    public function getServices(){
        return $this->executeQuery("SELECT * FROM v_service");
    }

    public function containsService($name){
        return !is_null($this->executeQuery("SELECT * FROM service WHERE name='$name' LIMIT 1")[0]);
    }

    public function addService($categoryId, $name, $description = null, $durationId, $price){
        $this->executeQuery("INSERT INTO service (category_id, name, description, duration_id, price) VALUES ($categoryId, '$name', '$description', $durationId, $price)");
    }

    public function getService($id){
        return $this->executeQuery("SELECT * FROM v_service WHERE id=$id")[0];
    }

    public function updateService($id, $categoryId, $name, $description = null, $durationId, $price){
        $this->executeQuery("UPDATE service SET category_id=$categoryId, name='$name', description='$description', duration_id=$durationId, price=$price WHERE id=$id");
    }

    public function removeService($id){
        $this->executeQuery("DELETE FROM service WHERE id=$id");
    }

    public function getExperiences(){
        return $this->executeQuery("SELECT * FROM experience");
    }

    public function getLevels(){
        return $this->executeQuery("SELECT * FROM level");
    }

    public function getBarbers(){
        return $this->executeQuery("SELECT * FROM v_barber");
    }

    public function addBarber($fullName, $photo, $levelId, $experienceId){
        $this->executeQuery("INSERT INTO barber (full_name, photo, level_id, experience_id) VALUES ('$fullName', '$photo', $levelId, $experienceId)");
    }

    public function getBarber($id){
        return $this->executeQuery("SELECT * FROM v_barber WHERE id=$id LIMIT 1")[0];
    }

    public function updateBarber($id, $fullName, $photo, $levelId, $experienceId){
        $this->executeQuery("UPDATE barber SET full_name='$fullName', photo='$photo', level_id=$levelId, experience_id=$experienceId WHERE id=$id");
    }

    public function removeBarber($id){
        $this->executeQuery("DELETE FROM barber WHERE id=$id");
    }

    public function addReception($userId, $barberId, $serviceId, $appointmentDate){
        $date = date("Y-m-d H:i:s");
        $this->executeQuery("INSERT INTO reception (user_id, barber_id, service_id, date_of_creation, appointment_date) VALUES ($userId, $barberId, $serviceId, '$date', '$appointmentDate')");
    }

    public function getMyNotes($userId){
        return $this->executeQuery("SELECT * FROM v_reception WHERE user_id=$userId");
    }

    public function removeReception($id){
        $this->executeQuery("DELETE FROM reception WHERE id=$id");
    }

    private function executeQuery($query){
        try{
            return ($this->contextDb->query($query))->FETCHALL(PDO::FETCH_ASSOC);
        }
        catch (PDOException $e){
            die($e->getMessage());
        }
    }
}
?>