<?php

namespace App\Enums;

enum JobRoleEnum: string
{
    case Developer = 'developer';
    case Designer = 'designer';
    case Product_Manager = 'product-manager';
    case Data_Scientist = 'data-scientist';
    case DevOps = 'devops';
    case QA = 'qa';
    case Scrum_Master = 'scrum-master';
    case Agile_Coach = 'agile-coach';
    case Project_Manager = 'project-manager';
    case Business_Analyst = 'business-analyst';
    case HR = 'hr';
    case Marketing = 'marketing';
    case Sales = 'sales';
    case Customer_Success = 'customer-success';
    case Support = 'support';
    case Legal = 'legal';
    case Finance = 'finance';
    case Operations = 'operations';
    case Executive = 'executive';
    case Other = 'other';
}
