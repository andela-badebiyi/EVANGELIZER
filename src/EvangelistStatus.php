<?php
/**
 * This class connects to the github api
 * This class receives a github users username during intialization and connects to github using the github api,
 * retrieves the amount of repo a user has and then processes this data to decipher the users status.
 *
 * @author Adebiyi Bodunde
 */
namespace bd;

class EvangelistStatus
{
    private $username;

    /**
     * Recieves a github user's username.
     *
     * @param string $username github username of a particular user
     */
    public function __construct($username = null)
    {
        if ($username === null) {
            throw new InvalidGitUserException('An error occured, you need to provide a user');
        }
        $this->username = $username;
    }

    /**
     * Sets a new user.
     *
     * @param string $username github username of a particular user
     */
    public function setUser($username)
    {
        $this->username = $username;
    }

    /**
     * Returns current user.
     *
     * @return string Returns the username of the current user
     */
    public function getUser()
    {
        return $this->username;
    }

    /**
     * Fetches a users Evangelism status.
     *
     * @return string The evangelism status of a user based on the users number of repos
     */
    public function getStatus()
    {
        $user_data = $this->getUserData($this->username);

        //check if user data is valid
        if (isset($user_data['message'])) {
            throw new InvalidGitUserException('An error occured, you need to provide a valid exception');
        }

        //user data is valid, proceed to process data
        $user_no_of_repos = $user_data['public_repos'];
        $user_full_name = $user_data['name'];

        return $this->getUserStatus($user_no_of_repos, $user_full_name);
    }

    /**
     * Connects to github using the github api and fetches the users data in json format.
     *
     * @param string $username valid username of a github user
     *
     * @return array an associative array holding all the users data
     */
    private function getUserData($username)
    {
        //set url and header parameters
        $url = 'https://api.github.com/users/'.$username;
        $header = array('User-Agent: $username');

        //connect to api and fetch user data in json format
        $connect = curl_init();
        curl_setopt($connect, CURLOPT_URL, $url);
        curl_setopt($connect, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($connect, CURLOPT_HTTPHEADER, $header);
        $data = curl_exec($connect);
        curl_close($connect);

        //convert json to associative array and return it
        return json_decode($data, true);
    }

    /**
     * recieves the number of repos of a user and process it to output the users
     * evangelism status.
     *
     * @param int    $repo_count The number of repos of a particular user
     * @param string $name       The full name of the owner of the repos
     *
     * @return string Evangelism status and comment
     */
    private function getUserStatus($repo_count, $name)
    {
        $messages = $this->statusMessages($name);
        if ($repo_count >= 21) {
            return $messages['senior_evangelist'];
        } elseif ($repo_count >= 11) {
            return $messages['associate_evangelist'];
        } elseif ($repo_count >= 5) {
            return $messages['junior_evangelist'];
        } else {
            return $messages['default'];
        }
    }

    private function statusMessages($name)
    {
        return array(
            'junior_evangelist' => $name." you are just a Junior Evangelist: You need to work a little harder beloved, 
                do not relax, do not relent, Go out there and spread the gospel",
            'associate_evangelist' => $name." you are an Associate Evangelist: Nice one beloved but you can do even better, make us proud.",
            'senior_evangelist' => $name." you are a Senior Evangelist: Great Work beloved!! Your reward is in programming heaven.",
            'default' => $name." you are unworthy of any ranking beloved, you have failed us!!",
        );
    }
}
