<?php

/** @MappedSuperclass */
abstract class Document
{
    /** @Id */
    private $id;
 
    /** @Increment */
    private $changes = 0;

    /** @String */
    private $name;

    /** @Date */
    private $createdOn;

    /** @Date */
    private $lastModified;
}
