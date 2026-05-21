<?php
declare(strict_types=1);

enum Statut:string{
    case PENDING = "pending";
    case ASSIGNED="assigned";
    case RESOLVED = "resolved";

}