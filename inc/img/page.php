<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			get_template_part( 'template-parts/content', 'page' );

			// End of the loop.
		endwhile;
		?>

	</main><!-- .site-main -->

</div><!-- .content-area -->
<?php get_sidebar(); ?>

<?php if (is_page('who-we-are')) { ?>
	<h3>CFO/Contracts</h3>
	<img src="http://design.brafton.com/sapere/wp-content/uploads/sites/36/2016/05/kevin2-300x300.jpg" alt="kevin2" width="300" height="300" class="alignleft size-medium wp-image-212" /><strong>Kevin Miedema</strong><br class="clear"/>
	<div class="yellow">
	<h3>Energy</h3>
	<strong>Kirsten Gable</strong><br/><img src="http://design.brafton.com/sapere/wp-content/uploads/sites/36/2016/05/Kirsten2-300x300.jpg" alt="Kirsten2" width="300" height="300" class="alignright size-medium wp-image-214" />
		<p>Kirsten Gable is a senior consultant with over 10 years of professional experience in technical facilitation, strategic planning, and decision analysis. She has led and contributed to engagements with governmental, private, and energy clients, aiding them in collaborative decision-making and risk management efforts for multi-million dollar projects. Ms. Gable is adept at understanding the key contributors to project risk and success and working closely with influential personnel to recommend an organization’s optimal structure and path forward.  In addition as a client delivery manager, Ms. Gable is responsible for managing Sapere Consulting staff, contracts, and projects.</p>
		<p>Ms. Gable leads Sapere’s Corporate Recruiting Initiative which includes responsibilities for development of the recruiting process and leading its implementation to ensure adequate recruitment of entry-level and experienced staff. Under Ms. Gable’s leadership Sapere recruits staff nationally from top universities.</p>
		<p>Ms. Gable holds a B.A. in Biology from Whitman College and an M.B.A. from Gonzaga University.  Her core skill set includes: Project and Program Management; Business Process Improvement; Regulatory and Policy Analysis; and Decision Engineering.</p><br/>

	<strong>Steve Lewis</strong><br/><br/>

	<strong>Marissa Steketee</strong><img src="http://design.brafton.com/sapere/wp-content/uploads/sites/36/2016/05/Marissa2b-300x300.jpg" alt="Marissa2b" width="300" height="300" class="alignright size-medium wp-image-216" /><br class="clear"/>
	</div>
	<div class="red">
	<h3>Technology</h3>
	<img src="http://design.brafton.com/sapere/wp-content/uploads/sites/36/2016/05/Andrew2-300x300.jpg" alt="Andrew2" width="300" height="300" class="alignleft size-medium wp-image-205" /><strong>Andrew Bulmer</strong><br/><br class="clear"/>

	<strong>Scott Smyth</strong><img src="http://design.brafton.com/sapere/wp-content/uploads/sites/36/2016/05/ScottS2c-300x300.jpg" alt="ScottS2c" width="300" height="300" class="alignright size-medium wp-image-220" />
		<p>Scott Smyth has over 20 years of experience in technical research and development in academia and private industry, including: risk analysis in software and system architecture, development team management, product management and redesign, and product development and intellectual property using Open Source Software including Linux and Android.  Mr. Smyth has facilitated prototype product design and development, market analysis, and grant proposal submittal for product clinical trials and commercialization.  In addition, he has served as an interim Chief Technology Officer (CTO) for his clients.  Mr. Smyth is frequently sought as an advisor by clients to assist with their product development strategies.</p>
		<p>Mr. Smyth leads Sapere’s Integrated Technology Sector where he is responsible for establishing and leading the implementation of the Sector’s business development strategy, developing new client relationships and managing the delivery of consulting services to existing clients.  The Integrated Technology Solutions Sector provides clients with leading-edge product development services including contracted research and development of intellectual property and vertical commercial markets.  Sapere provides technology product development services to Fortune 500 and start-up companies focused on integration of information storage in consumer and enterprise products. Mr. Smyth has worked previously at Optifacio, Connex, Applied Networks and Geogia Institute of Technology.</p>
		<p>Mr. Smyth holds a B.S.in Earth Sciences from Stanford University and an M.S and Ph.D. from the Georgia Institute of Technology where he had the distinction of being a Presidential Scholar.  His core skill set includes: Product Life Cycle Development; Decision Engineering; and Business Process Improvement.</p><br/>

	<img src="http://design.brafton.com/sapere/wp-content/uploads/sites/36/2016/06/dsullivan.jpg" alt="David Sullivan" width="300" height="300" class="alignleft size-medium"><strong>David Sullivan</strong><br class="clear"/>

	<strong>Scott Talbert</strong><img src="http://design.brafton.com/sapere/wp-content/uploads/sites/36/2016/05/Scott2-300x300.jpg" alt="Scott2" width="300" height="300" class="alignright size-medium wp-image-219" /><br/>
	<br class="clear"/>
	</div>
	<div class="blue">
	<h3>Federal</h3>

	<img src="http://design.brafton.com/sapere/wp-content/uploads/sites/36/2016/06/jguelker.jpg" alt="jguelker" width="300" height="300" class="alignleft size-medium" /><strong>Johnnie Guelker</strong><br/>
		<p>Johnnie F. Guelker  has 33 years’ experience in project and construction management, facility operations, and environmental compliance and restorations activities for high hazard facilities and nuclear explosive operations for both the Department of Energy and the Department of Defense.  He is currently retired but worked as a federal assistant manager responsible for administering the Management and Operating contract for Pantex while ensuring day-to-day operations are conducted in a safe, secure, and environmentally sound manner.  He acted on behalf of the Pantex Manager for environmental compliance and restoration activities and as the liaison with those program regulators, site operations related to maintenance, constructions and readiness in technical base and facilities budgets for the site.  He and his staff work with the site contractor to support the Pantex mission by providing projects, permits and restoration of legacy contamination to support the nation’s nuclear deterrent.</p>
        <p>Prior to becoming Assistant Manager, Mr. Guelker served in several capacities in the Pantex Site Office administering and managing facilities operations and management, construction projects and management, project management for numerous large projects, balance of plant and operations maintenance, utilities, Environmental Compliance activities (consisting of waste operations and all permits {air, water, sewer, waste management, etc.}), and Environmental Restoration programs (consisting of a Federal Facilities Agreement with EPA region 6 under the Comprehensive Environmental Resource, Compensation and Liability Act {CERCLA}and a Texas Commission for Environmental Quality Compliance Plan Permit under the Resource Conservation and Recovery Act {RCRA}), a facility representative, and performed design work as a Civil/Structural Engineer.</p>
        <p>Prior to coming to Pantex, Mr. Guelker worked for the Department of Defense at the Pueblo Depot Activity, Rocky Mountain Arsenal, and the US Army Corps of Engineers, Ft. Worth District.  He has a Bachelor’s degree in Civil Engineering from Texas A&M University with work toward a Masters degree at Texas Christian University, a professional engineering license in Texas and Colorado, a Project Management Professionals certification from the Project Management Institute and Level 3 (certified to manage project up to $400 million) Project Management Career Development Program certification from DOE.</p>
        <p>Since December of 2013, Mr. Guelker has been a senior Project Management Consultant for Longenecker and Associates working on support documents for the ECMS contract for Acquisition and Project Management in NNSA and other contract support for Babcock and Wilcox and Sapere Consulting at the Waste Isolation pilot Plant.  He has provided facility walk down support for the transition of the new M&O contract at Pantex and Y-12 Consolidated Nuclear (CNS).</p><br/>


	<strong>Kevin Kytola</strong><img src="http://design.brafton.com/sapere/wp-content/uploads/sites/36/2016/05/KevinK2-300x300.jpg" alt="KevinK2" width="300" height="300" class="alignright size-medium wp-image-213" /><br/>
		<p>Kevin Kytola has over 20 years of experience in diverse technical and management environments. His areas of expertise include project planning and implementation, risk management, decision analysis, and facilitation of collaborative multi-stakeholder decision-making efforts for multi-million dollar private and government projects. Throughout his career, Mr. Kytola has contributed to all aspects of the project planning and implementation life-cycle, excelling in environments where decision-makers, project stakeholders, and the implementing workforce must collaborate on project scope, execution approach and performance evaluation.</p>
		<p>Mr. Kytola is a founder of Sapere and leads Sapere’s Walla Walla office. He is responsible for mentorship, training and development of the Walla Walla consulting staff, as well as developing and managing client relationships for the Energy and Industry Sector. Mr. Kytola has worked previously at Project Performance Corporation, International Technology Corporation and Westinghouse.</p>
		<p>Mr. Kytola has a B.S. in Environmental Science and Regional Planning from Washington State University and holds an Associate Level Certified Master Facilitator rating from the International Institute for Facilitation.</p><br/>

	<img src="http://design.brafton.com/sapere/wp-content/uploads/sites/36/2016/05/Emily2-300x300.jpg" alt="Emily2" width="300" height="300" class="alignleft size-medium wp-image-209" /><strong>Emily MacDonald</strong>
		<p>Ms. Macdonald is a Senior Consultant with Sapere Consulting, Inc. where she contributes skills in the areas of technical facilitation, project risk management, and strategic planning. She has extensive experience working with federal agencies and their state and federal regulators to reach consensus on technically-justified decisions. Before working with Sapere, Ms. Macdonald worked as Associate with Project Performance Corporation.</p><br class="clear"/>

	<strong>Debbie White</strong><img src="http://design.brafton.com/sapere/wp-content/uploads/sites/36/2016/05/Debbie2-300x300.jpg" alt="Debbie2" width="300" height="300" class="alignright size-medium wp-image-208" />
		<p>Ms. White is a senior consultant with 24 years of professional experience in project management, strategic planning, collaborative decision analysis, training, and technical facilitation. She has worked for the Federal government as both an employee and a consultant, with primary focus on the design and implementation of multi-million dollar programs resulting in savings while maintaining positive relationships from diverse Federal, State and local stakeholders with competing goals. Ms. White has contributed to all aspects of the project planning and implementation, excelling in environments where cross-functional teams, decision-makers, and regulating agencies must collaborate on project scope and execution approach. She is adept at understanding root cause analysis and identifying key contributors to project risks in order to focus on areas requiring process changes that will result in the greatest chance for success, and then developing the organizational governance processes that will implement the changes successfully. Ms. White has recently integrated application of those skills into private utility organizations.</p><br class="clear"/>

	<img src="http://design.brafton.com/sapere/wp-content/uploads/sites/36/2016/05/Erich2-300x300.jpg" alt="Erich2" width="300" height="300" class="alignleft size-medium wp-image-210" /><strong>Erich Wolf</strong>
		<p>Erich Wolf is a Senior Consultant with over 10 years of professional experience in risk management, baseline development, strategic planning, and decision analysis. He has led and contributed to engagements with governmental, private and energy clients. Mr. Wolf’s work has included planning, development and management of project baselines, risk management and strategic planning for multi-million dollar projects. His diverse experience has included work on construction projects, facility disposition, fish propagation programs and LEED-certified buildings.  Mr. Wolf is adept at understanding the key contributors to project risk and success and working closely with influential personnel to recommend an project’s optimal structure and path forward.  In addition as a client delivery manager, Mr. Wolf is responsible for managing Sapere Consulting staff, contracts, and projects.</p>
		<p>Mr. Wolf is a Senior Consultant focusing on project planning and management and risk management.  Mr. Wolf led the development of Sapere’s internal project management training.  Mr. Wolf also participates on Sapere’s Recruiting Committee.</p>
		<p>	Mr. Wolf holds a B.A., Cum Laude in Economics with Honors from Whitman College and participated in the Business Bridge Program at the Tuck School of Business at Dartmouth College. Mr. Wolf also holds certifications as a Project Management Professional and Certified Cost Estimator. His core skill set includes: Project and Program Management; and Decision Engineering.</p><br/>
	</div><br class="clear"/>
<?php }?>

<?php get_footer(); ?>
