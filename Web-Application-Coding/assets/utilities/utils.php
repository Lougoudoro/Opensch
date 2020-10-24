<?php 
session_start();

	//Redirige l'utilisateur vers l'URL
	function Redirect($path)
	{
		//echo $path;
		header("Location:  ".$path);
		exit();
	}

	/*methode pour upload des fichiers
	NB: les fichiers seront enregistres dans un dossier creer au prealable et de nom a preciser
	les fichiers peuvent etre envoyes avec l'attribut multiple html5*/

	function Files($inputName, $folder, $type)
	{
		if (isset($_FILES[$inputName]) AND !empty($_FILES[$inputName]))
		{
			/*on check que cest lattribut multiple qui est utilise
				si oui on recuperera les donnees sous form
			*/
				
			if (is_array($_FILES[$inputName]['name'])) 
			{
				//on declare notre variable de retour qui sera un array
				$file = array();
				for ($i = 0; $i < count($_FILES[$inputName]['name']); $i++)
				{ 
					//on recupere le nom entier du fichier envoye
					$infosfichier = pathinfo($_FILES[$inputName]['name'][$i]);

					//on recupere l'extension du fichier
					$extension_upload = $infosfichier['extension'];
					$extension_autorisees; 
					//on definit les extensions autorisees
					if (is_numeric($type)) 
					{
						switch ($type) 
						{
							// 1 pour les images
							case 1:
								$extension_autorisees = array('jpg','jpeg', 'png', 'gif', 'JPEG','JPG', 'PNG', 'GIF');
								break;
							// 2 pour les audios
							case 2:
								$extension_autorisees = array('mp3','mp4', 'wav', 'MP3','MP4', 'WAV' );
								break;
							// 3 pour les videos
							case 3:
								$extension_autorisees = array('mp3','mp4', 'wav', 'avi', 'flv', 'vob', 'MP3','MP4', 'WAV', 'AVI', 'FLV', 'VOB');
								break;
							// pour les documents word, excel, pdf et powerpoint
							case 4:
								$extension_autorisees = array('doc', 'docs', 'xls', 'pdf', 'pptx');
								break;
								// 7 pour tous les types
							default:
									$extension_autorisees = array('jpg','jpeg', 'png', 'gif', 'JPEG','JPG', 'PNG', 'GIF', 'mp3','mp4', 'wav', 'MP3','MP4', 'WAV', 'avi', 'flv', 'vob', 'MP3','MP4', 'WAV', 'AVI', 'FLV', 'VOB');
									break;
						}
					}
					
					//on verifie que l'extension du fichier uploade est parmi celles autorisees
					if(in_array($extension_upload, $extension_autorisees))
					{	
						//on deplace le fichier vers le dossier $folder specifie
						move_uploaded_file($_FILES[$inputName]['tmp_name'][$i], './'.$folder.'/'.basename($_FILES[$inputName]['name'][$i]));
						//echo $_FILES[$inputName]['name'][$i];
						array_push($file, $_FILES[$inputName]['name'][$i]);
						//on retourne le nom du fichier + son extension pour une eventuelle mise a jour ou une insertion dans la base de donnee
					}
					//si l'extension du fichier nexiste pas dans notre liste ou si le type de $type nest pas numerique
					if (!is_numeric($type) || !in_array($extension_upload, $extension_autorisees))
					{
						$error = "Erreur lors de l'enregistrement du fichier: fichier trop lourd ou extension nom supportee ";
						echo $error;
					}
				}
				//on retourne la liste des fichiers uploades sous forme de tableau
				return $file;
			}
			else
			{
				//on recupere le nom entier du fichier envoye
				$infosfichier = pathinfo($_FILES[$inputName]['name']);
				//on recupere l'extension du fichier
				$extension_upload = $infosfichier['extension'];
				$extension_autorisees; 
				//on definit les extensions autorisees
				if (is_numeric($type)) 
				{
					switch ($type) 
						{
							// 1 pour les images
							case 1:
								$extension_autorisees = array('jpg','jpeg', 'png', 'gif', 'JPEG','JPG', 'PNG', 'GIF');
								break;
							// 2 pour les audios
							case 2:
								$extension_autorisees = array('mp3','mp4', 'wav', 'MP3','MP4', 'WAV' );
								break;
							// 3 pour les videos
							case 3:
								$extension_autorisees = array('mp3','mp4', 'wav', 'avi', 'flv', 'vob', 'MP3','MP4', 'WAV', 'AVI', 'FLV', 'VOB');
								break;
							// pour les documents word, excel, pdf et powerpoint
							case 4:
								$extension_autorisees = array('doc', 'docs', 'xls', 'pdf', 'pptx');
								break;
								// 7 pour tous les types
							default:
									$extension_autorisees = array('jpg','jpeg', 'png', 'gif', 'JPEG','JPG', 'PNG', 'GIF', 'mp3','mp4', 'wav', 'MP3','MP4', 'WAV', 'avi', 'flv', 'vob', 'MP3','MP4', 'WAV', 'AVI', 'FLV', 'VOB');
									break;
						}
				}
					
				//on verifie que l'extension du fichier uploade est parmi celles autorisees
				if(in_array($extension_upload, $extension_autorisees))
				{	
					//on deplace le fichier vers le dossier $folder specifie
					move_uploaded_file($_FILES[$inputName]['tmp_name'], './'.$folder.'/'.basename($_FILES[$inputName]['name']));
					$file = $_FILES[$inputName]['name'];
					//on retourne le nom du fichier + son extension pour une eventuelle mise a jour ou une insertion dans la base de donnee
					return $file;
				}
				//si l'extension du fichier nexiste pas dans notre liste ou si le type de $type nest pas numerique
				if (!is_numeric($type) || !in_array($extension_upload, $extension_autorisees))
				{
					$error = "Erreur lors de l'enregistrement du fichier: fichier trop lourd ou extension nom supportee ";
					echo $error;
				}
			}
		}
	}
	/*
   methode securisation des donnees envoyees a la base afin deviter les injections et autres failles dues aux donnees envoyees par lutilisateur
   */
	function Protect($chaine)
	{
		if (!is_numeric($chaine) AND !is_array($chaine)) 
		{
			// on supprime les caractères invisibles en début et fin de chaîne
		   $chaine = trim($chaine);
		   //var_dump($chaine);
		   // on supprime les les balises se trouvant dans la chaîne
		   $chaine = Strip_tags($chaine);
		   // si magic quote est activé on ajoute des slashes
		   if (function_exists('get_magic_quotes_gpc') && get_magic_quotes_gpc())
		   {
		   		$chaine = stripslashes($chaine);
		   } 
		       
		} 
		else if (is_array($chaine))
		{
			// on supprime les caractères invisibles en début et fin de chaîne
		   $chaine = array_map('trim', array_values($chaine));
		   //var_dump($chaine);
		   // on supprime les les balises se trouvant dans la chaîne
		   $chaine = array_map('Strip_tags', array_values($chaine));
		   // si magic quote est activé on ajoute des slashes
		   if (function_exists('get_magic_quotes_gpc') && get_magic_quotes_gpc())
		   {
		   		$chaine = array_map('stripslashes', array_values($chaine));
		   } 
		}

		return $chaine; // on retourne le résultat final     
	}
	/*fonction pour la creation des sessions*/
    function setSession($varSession, $Field)
    {
    	 $_SESSION[$varSession] = $Field;//On créer une variable session qui à pour valeur l'id de l'utilisateur logé
    }
    //fonction de destuction des sessions
    function unsetSession($varSession)
	{	
		//on detruit la session 		
		session_destroy($_SESSION[$varSession]);
		if(isset($_SESSION[$varSession]))
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	//fonction denvoie de mail personalisee
	function Sendmail($auteur, $destinataire, $sujet, $message)
	{
		$destinataire;
		$sujet;
		//retour a la ligne automatique apres 70 mots par ligne
		$message = wordwrap($message, 70);
		//If a full stop is found on the beginning of a line in the message, it might be removed. To solve this problem, replace the full stop with a double dot
		$message = str_replace('\n.', '\n..', $message);
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

		//definition de l'auteur du message
		$headers .= 'From: <'.$auteur.'>' . "\r\n";
		//on mets laddresse de lauteur en copie pour s'assurer que le mesage est bien envoye
		$headers .= 'Cc: '.$auteur.'' . "\r\n";

		mail($destinataire, $sujet, $message, $header);
	}

	function SetMessage($message, $type, $margins, $size)
	{
		switch ($type) 
		{
			case 'success':
				$type = 'success alert-success';
				break;
			case 'alert':
				$type = 'info alert-danger';
				break;
			case 'info':
				$type = 'info alert-info';
				break;
			case 'warning':
				$type = 'warning alert-warning';
				break;
			
			default:
				# code...
				break;
		}
	}
	//function pour reformer la date pour lafficher dans u input de type date
	function ShowDate($date)
	{
		$date = substr($date, 0, 10);
		return $date;
	}
	//fonction pour creer un dossier
	function CreateDirectory($pathdir)
	{
		if (!is_dir($pathdir)) 
		{
			mkdir($pathdir);
		}
	}

	//fonction pour lister les fichiers dans un repertoire
	function ShowFiles($path = '', $fileName = '', $extension = '')
	{
		$listeOfFiles = array();
		//on verifie que le chemin est defini
		if (!empty($path))
		{
			//sil nya ni dextension, ni de nom de fichier, alors on liste tous les fichiers quelque soit leur extension
			if (empty($extension) AND empty($fileName)) 
			{
				$listeOfFiles = glob($path."/*.*");
			}
			//sil ya dextension, mais pas de nom de fichier, est defini alors on liste tous les fichiers quelque soit leur extension
			elseif (!empty($extension) AND empty($fileName)) 
			{
				$listeOfFiles = glob($path."/*.".$extension);
			}
			//sil nya pas dextension, mais le du nom de fichier, est defini alors on liste tous les fichiers en fonction du nom voulu
			elseif (empty($extension) AND !empty($fileName)) 
			{
				$listeOfFiles = glob($path."/".$fileName.".*");
			}
			//si non, on fait des fichier en fonctin de lextension et du du nom voulu
			else
			{
				$listeOfFiles = glob($path."/".$fileName.".".$extension);
			}
			//retour de la liste des fichiers
			return $listeOfFiles;
		}
		//si non, on retourne 0
		else
		{
			return 0;
		}
	}
	//function pour retourner le nom de la page courante
	function GetCurrentPageName()
	{
		return $_SERVER['PHP_SELF'];
	}
	//function pour rafraichir/rechrager la page actuelle
	function Refresh()
	{
		Redirect(GetCurrentPageName());
	}

 ?>