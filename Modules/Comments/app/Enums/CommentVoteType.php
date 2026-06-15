<?php

namespace Modules\Comments\app\Enums;

enum CommentVoteType:string
{
  case Like = 'like';
  case Dislike = 'dislike';
}
