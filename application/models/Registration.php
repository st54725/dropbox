<?php
class Registration extends Zend_Db_Table_Abstract
{
    /**
     * Имя таблицы
     * @var string
     */
    protected $_name = 'users';

    /**
     * Получить все статьи или одну
     *
     * @param int $articleId Идентификатор статьи
     * @return array
     */
    public function setUser($name,$email,$pass)
    {
        $table = new Registration();
        $data = array(
            'username' => $name,
            'password' => $pass,
            'email' => $email,
        );
        $table->insert($data);
    }

    public function getId($username)
    {
        // Создание объекта Zend_Db_Table_Select,
        // Нам не нужно указывать название таблицы как в Zend_Db_Select
        $select = $this->select()
        // Накладываем условие
            ->where('username = ?', $username);
        // Выполняем запрос и получаем объект Zend_Db_Table_Row в результате
        // Нам не нужно предварительно выполнять запрос методом query, как в Zend_Db_Select
        $result = $this->fetchRow($select);

        return $result;

    }
}