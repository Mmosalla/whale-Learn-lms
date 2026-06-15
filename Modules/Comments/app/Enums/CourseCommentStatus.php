<?php

namespace Modules\Comments\app\Enums;

enum CourseCommentStatus:string
{
  case Draft = 'draft';
  case Accepted = 'accepted';
  case Rejected = 'rejected';
}
