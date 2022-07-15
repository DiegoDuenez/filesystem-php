<?php

include 'src/FileSystem.php';



FileSystem::getExtensionFrom('./index.php');

FileSystem::makeDirectory('./new-directory');

FileSystem::renameDirectory('./new-directory', 'new-rename2');

FileSystem::getFilesFrom('./new-rename');

FileSystem::dropFilesFrom('./new-rename');

FileSystem::directoryExists('./new-rename');

FileSystem::makeFile('./text.txt');

FileSystem::fileExists('./text.txt');

FileSystem::writeFile('./text.txt', 'Writing a file');

FileSystem::dropFile('./drop.php');