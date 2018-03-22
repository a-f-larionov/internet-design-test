<?php

namespace App;

class Employee extends Candidate
{
    const POSITION_CEO = 'ceo';
    const POSITION_DEVELOPER = 'developer';
    const POSITION_MANAGER = 'manager';

    protected $fillable = ['id', 'name', 'resume_url', 'resume_received_at', 'recruit_at', 'position'];

    protected $visible = ['id', 'name', 'resume_url', 'resume_received_at', 'recruit_at', 'position'];
}