import home from './components/HomeComponent';
import blog_details from './components/BlogDetailComponent';

const routes = [
    {
        path: '/',
        component: home,
        name: 'home'
    },
    {
        path: '/blog/:id',
        component: blog_details,
        name: 'blog_details'
    }
];

export default routes;