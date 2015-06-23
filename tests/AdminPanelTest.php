<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use MonkBlog\Models\Post;
use MonkBlog\Models\Page;
use MonkBlog\Models\Option;
use MonkBlog\Models\User;

class AdminPanelTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @var MonkBlog\Models\User
     */
    protected static $user;

    /**
     * @var string
     */
    protected $createPath;

    /**
     * @var string
     */
    protected $editPath;

    /**
     * @var array
     */
    protected $data = [ ];

    /**
     * @var string
     */
    protected $model = 'Post';

    /**
     * @return User
     */
    public function getTestUser()
    {
        if( self::$user instanceof User ) {
            return self::$user;
        }

        return self::$user = User::find( 1 );
    }

    /**
     * @param string $visit
     * @param string $see
     *
     * @return $this
     */
    public function viewItem( $visit = '/', $see = 'No Posts Found' )
    {
        $this->visit( $visit )
            ->see( $see );

        return $this;
    }

    /**
     * @param string $visit
     * @param string $see
     *
     * @return $this
     */
    protected function setAdminPage( $visit = '/admin', $see = 'Dashboard' )
    {
        $this->actingAs( $this->getTestUser() )
            ->withSession( [ 'foo' => 'bar' ] )
            ->visit( $visit )
            ->see( $see );

        return $this;
    }

    /**
     * @param string $visit
     * @param string $click
     *
     * @return $this
     */
    protected function clickAdminPanel( $visit = '/admin', $click = 'button' )
    {
        $this->actingAs( $this->getTestUser() )
            ->withSession( [ 'foo' => 'bar' ] )
            ->visit( $visit )
            ->click( $click );

        return $this;
    }

    /**
     * @return string
     */
    protected function getModelClassName()
    {
        return "MonkBlog\\Models\\" . $this->model;
    }

    /**
     * @return Post|Page|Option
     */
    protected function getNewModel()
    {
        $class = $this->getModelClassName();

        return new $class;
    }

    /**
     * @param string $model
     *
     * @return $this
     */
    protected function setModel( $model = 'Page' )
    {
        $this->model = $model;

        return $this;
    }

    /**
     * @param array $data
     *
     * @return $this
     */
    protected function setData( $data = [ ] )
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @param $path
     *
     * @return $this
     */
    protected function setCreatePath( $path )
    {
        $this->createPath = $path;

        return $this;
    }

    /**
     * @param $path
     *
     * @return $this
     */
    protected function setEditPath( $path )
    {
        $this->editPath = $path;

        return $this;
    }

    /**
     * @return $this
     */
    protected function CRUDModel()
    {
        //Create calls
        $this->call( 'POST', $this->createPath, $this->data )->isOk();

        $this->call( 'POST', $this->createPath, [ ] )->isRedirect( $this->createPath );

        //Create and save model with data
        $model = $this->getNewModel();

        $this->assertInstanceOf( $this->getModelClassName(), $model );

        $create = $model->create( $this->data );

        $this->assertInstanceOf( $this->getModelClassName(), $create );

        //Call to edit forms
        $this->call( 'POST', $this->editPath, $this->data )->isOk();

        $this->call( 'POST', $this->editPath, [ ] )->isRedirect( $this->editPath );

        return $this;
    }

    /**
     * @group admin
     */
    public function testIndexAdminPage()
    {
        $this->setAdminPage();
    }

    /**
     * @group admin
     * @group posts
     */
    public function testPostsAdminPage()
    {
        $this->setAdminPage( '/admin/posts', 'All Posts' );
    }

    /**
     * @group admin
     * @group pages
     * @group crud
     */
    public function testPostsCRUDPage()
    {
        $goodData = [
            'title' => 'First Post',
            'summary' => 'This is the first post',
            'slug' => 'first-post',
            'category_id' => 1,
            'body' => 'Lets blog.',
        ];

        $this->setCreatePath( '/admin/posts/create' )
            ->setData( $goodData )
            ->setEditPath( '/admin/posts/1/edit' )
            ->CRUDModel()
            ->setAdminPage( '/admin/posts', 'First Post' )
            ->clickAdminPanel( '/admin/posts', 'Publish' )
            ->viewItem( '/post/first-post', 'First Post' )
            ->clickAdminPanel( '/admin/posts', 'Delete' );

//        $this->clickAdminPanel('/admin/posts/1/delete', 'Delete Forever');
    }

    /**
     * @group admin
     * @group pages
     */
    public function testPagesAdminPage()
    {
        $this->setAdminPage( '/admin/pages', 'All Pages' );
    }

    /**
     * @group admin
     * @group pages
     * @group crud
     */
    public function testPagesCRUDPage()
    {
        $goodData = [
            'title' => 'First Page',
            'slug' => 'first-page',
            'body' => 'This is a page.',
        ];

        $this->setCreatePath( '/admin/pages/create' )
            ->setModel( 'Page' )
            ->setData( $goodData )
            ->setEditPath( '/admin/pages/1/edit' )
            ->CRUDModel()
            ->setAdminPage( '/admin/pages', 'First Page' )
            ->clickAdminPanel( '/admin/pages', 'Publish' )
            ->viewItem( '/first-page', 'First Page' )
            ->clickAdminPanel( '/admin/pages', 'Delete' );

//        $this->clickAdminPanel('/admin/pages/1/delete', 'Delete Forever');
    }

    /**
     * @group admin
     * @group categories
     */
    public function testCategoriesAdminPage()
    {
        $this->setAdminPage( '/admin/categories', 'Categories' );
    }

    /**
     * @group admin
     * @group categories
     * @group crud
     */
    public function testCategoriesCRUDPage()
    {
        $goodData = [
            'title' => 'Second Category',
            'slug' => 'second-category',
            'description' => 'This is a category description.',
        ];

        $this->setCreatePath( '/admin/categories/create' )
            ->setModel( 'Category' )
            ->setData( $goodData )
            ->setEditPath( '/admin/categories/1/edit' )
            ->CRUDModel()
            ->setAdminPage( '/admin/categories', 'Second Category' )
            ->clickAdminPanel( '/admin/categories', 'Delete' );

//        $this->clickAdminPanel('/admin/categories/2/delete', 'Delete Forever');
    }

    /**
     * @group admin
     * @group user
     */
    public function testUsersAdminPage()
    {
        $this->setAdminPage( '/admin/users', 'Users' );
    }

    /**
     * @group admin
     * @group user
     * @group crud
     */
    public function testUserCRUDPage()
    {
        $goodData = [
            'first_name' => 'Second Test',
            'last_name' => 'User',
            'display_name' => 'second_test_user',
            'email' => 'second_test@email.com',
            'password' => ENV( 'APP_KEY', 'password' ),
            'password_confirmation' => ENV( 'APP_KEY', 'password' ),
        ];

        $this->setCreatePath( '/admin/users/create' )
            ->setModel( 'User' )
            ->setData( $goodData )
            ->setEditPath( '/admin/users/2/edit' )
            ->CRUDModel()
            ->setAdminPage( '/admin/users', 'Second Test User' )
            ->setAdminPage( '/admin/users/2', 'Second Test User' )
            ->viewItem( '/admin/users/2', 'Second Test User' )
            ->viewItem( '/admin/users/2', 'second_test@email.com' )
            ->clickAdminPanel( '/admin/users', 'Delete' );

//        $this->clickAdminPanel('/admin/users/2/delete', 'Delete Forever');
    }

    /**
     * @group admin
     * @group options
     */
    public function testOptionsAdminPage()
    {
        $this->setAdminPage( '/admin/options', 'General Options' );
    }

    /**
     * @group admin
     * @group options
     */
    public function testOptionsContactAdminPage()
    {
        $this->setAdminPage( '/admin/options/contact_info', 'Contact Info' );
    }

}
