<?php

namespace App;

class TaskFilter
{
    protected $builder;
    protected $request;

    public function __construct($builder, $request)
    {
        $this->builder = $builder;
        $this->request = $request;
    }
    
    public function apply()
    {
        foreach ($this->filters() as $filter => $value) {
            if (method_exists($this, $filter)) {
                $this->$filter($value);
            }
        }

        return $this->builder;
    }

    public function filters()
    {
        return $this->request->all();
    }

    public function myTasks()
    {
        $authUser = \Auth::user()->id;
        return $this->builder->UserTasks($authUser);
    }

    public function status($value)
    {
        return $this->builder->TaskWithStatus($value);
    }

    public function assignedTo($value)
    {
        
        return $this->builder->AssignedToTasks($value);
    }

    public function tag($value)
    {
        if (!$value) {
            return;
        }
        
        return $this->builder->Tag($value);
    }
}
